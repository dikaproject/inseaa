<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attachment;
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
        $products = Product::with('category') // pastikan kategori juga diambil
            ->where('name', 'LIKE', '%' . $searchTerm . '%')
            ->get();

        // Kirimkan hasilnya sebagai JSON
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
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details_product' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'images' => 'required|image|mimes:jpeg,png|max:1024',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        $imageName = null;
        if ($request->hasFile('images')) {
            // Proses penyimpanan gambar
            $image = $request->file('images');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
        }

        $pdfName = null;
        if ($request->hasFile('pdf')) {
            // Proses penyimpanan PDF
            $pdf = $request->file('pdf');
            $pdfName = time() . '.' . $pdf->extension();
            $pdf->move(public_path('pdfs'), $pdfName);
        }

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->details_product = $request->details_product;
        $product->category_id = $request->category_id;
        $product->images = $imageName ?? null;
        $product->pdf = $pdfName ?? null;
        $product->alt_text = $request->alt_text;

        if ($request->filled('slug')) {
            $product->slug = Str::slug($request->slug);
        } else {
            $product->slug = Str::slug($request->name);
        }

        $product->save();

        return redirect()->route('admin.products.index')->with('success', 'Product Has Been created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'details_product' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'images' => 'nullable|image|mimes:jpeg,png|max:1024',
            'pdf' => 'nullable|file|mimes:pdf|max:2048',
            'alt_text' => 'nullable|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        $imageName = $product->images;
        if ($request->hasFile('images')) {
            // Proses penyimpanan gambar
            $image = $request->file('images');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);

            // Hapus gambar lama jika berhasil upload gambar baru
            $oldImage = public_path('images/' . $product->images);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
        }

        $pdfName = null;
        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf');
            $pdfName = Str::slug($request->name) . '-' . time() . '.' . $pdf->extension();
            $pdf->move(public_path('pdfs'), $pdfName);

            // Hapus PDF lama jika berhasil upload PDF baru
            $oldPdf = public_path('pdfs/' . $product->pdf);
            if (File::exists($oldPdf)) {
                File::delete($oldPdf);
            }
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'details_product' => $request->details_product,
            'category_id' => $request->category_id,
            'alt_text' => $request->alt_text,
            'images' => $imageName,
            'pdf' => $pdfName,
            'slug' => $slug ?? Str::slug($request->name),
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully.');
    }

    public function show(Product $product)
    {
        $attachments = $product->attachments()->get(); // Ambil semua attachment yang terkait dengan produk
        $categories = Category::all();
        $products = Product::all();
        return view('products.show', compact('product', 'attachments', 'categories', 'products'));
    }

    public function view(Request $request)
    {
        $categories = Category::all();

        // Cek apakah ada request untuk filter kategori
        if ($request->has('category') && $request->category != '') {
            $products = Product::where('category_id', $request->category)->get();
        } else {
            $products = Product::all();
        }

        return view('products.allproducts', compact('categories', 'products'));
    }

    public function destroy(Product $product)
    {
        // Hapus gambar terkait
        $oldImage = public_path('images/' . $product->images);
        if (File::exists($oldImage)) {
            File::delete($oldImage);
        }

        // Hapus PDF terkait
        $oldPdf = public_path('pdfs/' . $product->pdf);
        if (File::exists($oldPdf)) {
            File::delete($oldPdf);
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully.');
    }

    public function deleteAllAttachments($productId)
    {
        // Retrieve the product
        $product = Product::findOrFail($productId);

        // Delete all attachments associated with the product
        $product->attachments()->delete();

        // Redirect back to the product's page with a success message
        return redirect()->back()->with('success', 'All attachments deleted successfully.');
    }
}
