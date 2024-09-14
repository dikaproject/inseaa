<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

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
