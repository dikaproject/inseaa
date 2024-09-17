<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Mews\Purifier\Facades\Purifier as FacadesPurifier;


class SellerProductController extends Controller
{
    // Middleware untuk memastikan hanya seller yang terautentikasi yang dapat mengakses controller ini
    public function __construct()
    {
        $this->middleware(['auth', 'role:seller']);
    }

    // Menampilkan daftar produk milik seller
    public function index()
    {
        $products = Product::where('seller_id', Auth::id())->get();
        return view('seller.products.index', compact('products'));
    }

    // Menampilkan form untuk membuat produk baru
    public function create()
    {
        $categories = Category::all();
        return view('seller.products.create', compact('categories'));
    }

    public function askAI(Request $request)
{
    // Validasi input
    $request->validate([
        'prompt' => 'required|string|max:255',
    ]);

    $prompt = $request->input('prompt');
    Log::info('Received prompt for AI:', ['prompt' => $prompt]);

    $apiKey = env('OPENAI_API_KEY');

    try {
        // Permintaan ke OpenAI GPT-3.5 Turbo menggunakan endpoint chat completions
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $apiKey,
            'Content-Type' => 'application/json',
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-4',
            'messages' => [
                [
                    'role' => 'system',
                    'content' => 'You are a helpful assistant that generates well-structured product descriptions in HTML format for an e-commerce platform.'
                ],
                [
                    'role' => 'user',
                    'content' => "Generate a product description for: " . $prompt . ". Provide a plain JSON object with the following fields without any markdown or code blocks:
                        {
                            \"name\": \"Product Name\",
                            \"description\": \"Short Description (under 150 characters)\",
                            \"details_product\": \"Detailed product description in HTML format\",
                            \"slug\": \"product-slug\",
                            \"alt_text\": \"Alt text for images\"
                        }"
                ]
            ],
            'max_tokens' => 1500,
            'temperature' => 0.7,
        ]);

        Log::info('Response from GPT-3.5 API:', ['response' => $response->body()]);

        // Mendapatkan hasil dari API OpenAI
        $aiResult = $response->json();

        // Mengambil teks dari respons
        if (!isset($aiResult['choices'][0]['message']['content'])) {
            Log::error('Unexpected AI response structure');
            return response()->json(['error' => 'Invalid AI response structure'], 500);
        }

        $outputText = $aiResult['choices'][0]['message']['content'];
        Log::info('AI output before cleaning:', ['outputText' => $outputText]);

        // Bersihkan outputText dari code blocks
        $outputText = $this->cleanAIResponse($outputText);
        Log::info('AI output after cleaning:', ['outputText' => $outputText]);

        // Mengambil objek JSON dari respons AI
        $data = json_decode($outputText, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            Log::error('Failed to decode AI JSON response:', ['error' => json_last_error_msg(), 'raw_output' => $outputText]);
            return response()->json(['error' => 'Invalid AI response format'], 500);
        }

        // Memastikan semua bidang yang diperlukan ada
        $requiredFields = ['name', 'description', 'details_product', 'slug', 'alt_text'];
        foreach ($requiredFields as $field) {
            if (!isset($data[$field])) {
                Log::error("Missing field '{$field}' in AI response");
                return response()->json(['error' => "Missing field '{$field}' in AI response"], 500);
            }
        }

        // Membersihkan dan memproses bidang
        $data['name'] = strip_tags(trim($data['name']));
        $data['description'] = strip_tags(trim($data['description']));
        $data['details_product'] = FacadesPurifier::clean(trim($data['details_product'])); // Sanitasi HTML
        $data['slug'] = Str::slug(trim($data['slug']));
        $data['alt_text'] = strip_tags(trim($data['alt_text']));

        return response()->json($data);
    } catch (\Exception $e) {
        Log::error('Error while calling GPT-3.5 API:', ['error' => $e->getMessage()]);
        return response()->json(['error' => 'AI request failed'], 500);
    }
}

private function cleanAIResponse($content)
{
    // Hapus code block fencing jika ada
    $content = preg_replace('/```json\s*/', '', $content);
    $content = preg_replace('/\s*```/', '', $content);
    return trim($content);
}



    // Menyimpan produk baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details_product' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'images' => 'required',
            'images.*' => 'image|mimes:jpeg,png|max:1024',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        // Proses upload PDF (jika ada)
        $pdfName = null;
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfName = time() . '.' . $pdf->extension();
            $pdf->move(public_path('pdfs'), $pdfName);
        }

        // Simpan data produk
        $product = new Product();
        $product->seller_id = Auth::id();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->details_product = $request->details_product;
        $product->category_id = $request->category_id;
        $product->pdf = $pdfName;
        $product->alt_text = $request->alt_text;
        $product->status = 'pending';

        if ($request->filled('slug')) {
            $product->slug = Str::slug($request->slug);
        } else {
            $product->slug = Str::slug($request->name);
        }

        $product->save();

        // Proses upload gambar-gambar
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);

                // Simpan data gambar ke tabel product_images
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imageName,
                    'alt_text' => $request->alt_text, // Anda bisa menyesuaikan alt text untuk setiap gambar jika diperlukan
                ]);
            }
        }

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil diunggah dan menunggu persetujuan admin.');
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        $product = Product::where('id', $id)
            ->where('seller_id', Auth::id())
            ->with('images') // Add this line
            ->firstOrFail();

        $categories = Category::all();
        return view('seller.products.edit', compact('product', 'categories'));
    }

    // Memperbarui data produk
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->where('seller_id', Auth::id())->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details_product' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'images' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png|max:1024',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        // Proses upload PDF (jika ada)
        $pdfName = $product->pdf;
        if ($request->hasFile('pdf')) {
            // Hapus PDF lama
            $oldPdf = public_path('pdfs/' . $product->pdf);
            if (File::exists($oldPdf)) {
                File::delete($oldPdf);
            }

            $pdf = $request->file('pdf');
            $pdfName = time() . '.' . $pdf->extension();
            $pdf->move(public_path('pdfs'), $pdfName);
        }

        // Update data produk
        $product->name = $request->name;
        $product->description = $request->description;
        $product->details_product = $request->details_product;
        $product->category_id = $request->category_id;
        $product->pdf = $pdfName;
        $product->alt_text = $request->alt_text;

        if ($request->filled('slug')) {
            $product->slug = Str::slug($request->slug);
        } else {
            $product->slug = Str::slug($request->name);
        }

        // Setelah update, set status kembali ke 'pending'
        $product->status = 'pending';

        $product->save();

        // Proses upload gambar-gambar baru (jika ada)
        if ($request->hasFile('images')) {
            // Hapus gambar-gambar lama
            foreach ($product->images as $image) {
                $oldImage = public_path('images/' . $image->image_path);
                if (File::exists($oldImage)) {
                    File::delete($oldImage);
                }
                $image->delete();
            }

            // Simpan gambar-gambar baru
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . uniqid() . '.' . $image->extension();
                $image->move(public_path('images'), $imageName);

                // Simpan data gambar ke tabel product_images
                ProductImage::create([
                    'product_id' => $product->id,
                    'image_path' => $imageName,
                    'alt_text' => $request->alt_text,
                ]);
            }
        }

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil diperbarui dan menunggu persetujuan admin.');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::where('id', $id)->where('seller_id', Auth::id())->firstOrFail();

        // Hapus PDF
        $pdfPath = public_path('pdfs/' . $product->pdf);
        if (File::exists($pdfPath)) {
            File::delete($pdfPath);
        }

        // Hapus gambar-gambar terkait
        foreach ($product->images as $image) {
            $imagePath = public_path('images/' . $image->image_path);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }
            $image->delete();
        }

        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    // Menghapus gambar individual (Opsional)
    public function destroyImage($productId, $imageId)
    {
        $product = Product::where('id', $productId)->where('seller_id', Auth::id())->firstOrFail();
        $image = ProductImage::where('id', $imageId)
            ->where('product_id', $product->id)
            ->firstOrFail();

        // Hapus file gambar
        $imagePath = public_path('images/' . $image->image_path);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        $image->delete();

        return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
    }
}
