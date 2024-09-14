<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attachment;
use App\Models\ProductImage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $attachments = Attachment::all();

        return view('admin.products.index', compact('products', 'attachments'));
    }

    public function searchProduct(Request $request)
    {
        $searchTerm = $request->get('term');

        // Cari produk yang cocok dengan input pencarian
        $products = Product::with('category')
            ->where('name', 'LIKE', '%' . $searchTerm . '%')
            ->get();

        return response()->json($products);
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'description'     => 'required|string',
            'details_product' => 'nullable|string',
            'category_id'     => 'required|exists:categories,id',
            'images'          => 'required',
            'images.*'        => 'image|mimes:jpeg,png|max:1024',
            'pdf'             => 'nullable|file|mimes:pdf|max:2048',
            'alt_text'        => 'nullable|string|max:255',
            'slug'            => 'nullable|string|max:255',
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
        $product->name            = $request->name;
        $product->description     = $request->description;
        $product->details_product = $request->details_product;
        $product->category_id     = $request->category_id;
        $product->pdf             = $pdfName;
        $product->alt_text        = $request->alt_text;
        $product->status          = 'approved'; // Status langsung 'approved' untuk admin

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
                    'alt_text'   => $request->alt_text, // Anda bisa menyesuaikan alt text untuk setiap gambar jika diperlukan
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dibuat.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'description'     => 'required|string',
            'details_product' => 'nullable|string',
            'category_id'     => 'required|exists:categories,id',
            'images'          => 'nullable',
            'images.*'        => 'image|mimes:jpeg,png|max:1024',
            'pdf'             => 'nullable|file|mimes:pdf|max:2048',
            'alt_text'        => 'nullable|string|max:255',
            'slug'            => 'nullable|string|max:255',
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
        $product->name            = $request->name;
        $product->description     = $request->description;
        $product->details_product = $request->details_product;
        $product->category_id     = $request->category_id;
        $product->pdf             = $pdfName;
        $product->alt_text        = $request->alt_text;

        if ($request->filled('slug')) {
            $product->slug = Str::slug($request->slug);
        } else {
            $product->slug = Str::slug($request->name);
        }

        // Status langsung 'approved' setelah update
        $product->status = 'approved';

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
                    'alt_text'   => $request->alt_text,
                ]);
            }
        }

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui.');
    }

    public function show(Product $product)
    {
        $attachments = $product->attachments()->get();
        $categories = Category::all();
        $products = Product::all();
        return view('products.show', compact('product', 'attachments', 'categories', 'products'));
    }

    public function view(Request $request)
    {
        $categories = Category::all();

        if ($request->has('category') && $request->category != '') {
            $products = Product::where('category_id', $request->category)
                ->where('status', 'approved')
                ->get();
        } else {
            $products = Product::where('status', 'approved')->get();
        }

        return view('products.allproducts', compact('categories', 'products'));
    }

    public function destroy(Product $product)
    {
        // Hapus PDF terkait
        $oldPdf = public_path('pdfs/' . $product->pdf);
        if (File::exists($oldPdf)) {
            File::delete($oldPdf);
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
        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus.');
    }

    public function destroyImage($productId, $imageId)
{
    $product = Product::findOrFail($productId);
    $image = ProductImage::where('id', $imageId)->where('product_id', $product->id)->firstOrFail();

    // Hapus file gambar
    $imagePath = public_path('images/' . $image->image_path);
    if (File::exists($imagePath)) {
        File::delete($imagePath);
    }

    $image->delete();

    return redirect()->back()->with('success', 'Gambar berhasil dihapus.');
}


    public function deleteAllAttachments($productId)
    {
        $product = Product::findOrFail($productId);

        // Hapus semua attachment yang terkait dengan produk
        $product->attachments()->delete();

        return redirect()->back()->with('success', 'Semua lampiran berhasil dihapus.');
    }

    public function pending()
    {
        $products = Product::where('status', 'pending')->get();
        return view('admin.products.pending', compact('products'));
    }

    public function approve($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 'approved';
        $product->save();

        return redirect()->route('admin.products.pending')->with('success', 'Produk berhasil disetujui.');
    }

    public function reject($id)
    {
        $product = Product::findOrFail($id);
        $product->status = 'rejected';
        $product->save();

        return redirect()->route('admin.products.pending')->with('success', 'Produk berhasil ditolak.');
    }
}
