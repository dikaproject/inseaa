<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
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
            'name'            => 'required|string|max:255',
            'description'     => 'required|string',
            'details_product' => 'nullable|string',
            'category_id'     => 'required|exists:categories,id',
            'images'          => 'required|image|mimes:jpeg,png|max:1024',
            'pdf'             => 'nullable|file|mimes:pdf|max:2048',
            'alt_text'        => 'nullable|string|max:255',
            'slug'            => 'nullable|string|max:255',
        ]);

        $imageName = null;
        if ($request->hasFile('images')) {
            // Proses upload gambar
            $image = $request->file('images');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
        }

        $pdfName = null;
        if ($request->hasFile('pdf')) {
            // Proses upload PDF
            $pdf = $request->file('pdf');
            $pdfName = time() . '.' . $pdf->extension();
            $pdf->move(public_path('pdfs'), $pdfName);
        }

        $product = new Product();
        $product->seller_id       = Auth::id(); // Mengaitkan produk dengan seller yang login
        $product->name            = $request->name;
        $product->description     = $request->description;
        $product->details_product = $request->details_product;
        $product->category_id     = $request->category_id;
        $product->images          = $imageName;
        $product->pdf             = $pdfName;
        $product->alt_text        = $request->alt_text;
        $product->status          = 'pending'; // Status awal 'pending'

        if ($request->filled('slug')) {
            $product->slug = Str::slug($request->slug);
        } else {
            $product->slug = Str::slug($request->name);
        }

        $product->save();

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil diunggah dan menunggu persetujuan admin.');
    }

    // Menampilkan form untuk mengedit produk
    public function edit($id)
    {
        $product = Product::where('id', $id)->where('seller_id', Auth::id())->firstOrFail();
        $categories = Category::all();
        return view('seller.products.edit', compact('product', 'categories'));
    }

    // Memperbarui data produk
    public function update(Request $request, $id)
    {
        $product = Product::where('id', $id)->where('seller_id', Auth::id())->firstOrFail();

        $request->validate([
            'name'            => 'required|string|max:255',
            'description'     => 'required|string',
            'details_product' => 'nullable|string',
            'category_id'     => 'required|exists:categories,id',
            'images'          => 'nullable|image|mimes:jpeg,png|max:1024',
            'pdf'             => 'nullable|file|mimes:pdf|max:2048',
            'alt_text'        => 'nullable|string|max:255',
            'slug'            => 'nullable|string|max:255',
        ]);

        $imageName = $product->images;
        if ($request->hasFile('images')) {
            // Proses upload gambar baru
            $image = $request->file('images');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);

            // Hapus gambar lama
            $oldImage = public_path('images/' . $product->images);
            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }
        }

        $pdfName = $product->pdf;
        if ($request->hasFile('pdf')) {
            // Proses upload PDF baru
            $pdf = $request->file('pdf');
            $pdfName = time() . '.' . $pdf->extension();
            $pdf->move(public_path('pdfs'), $pdfName);

            // Hapus PDF lama
            $oldPdf = public_path('pdfs/' . $product->pdf);
            if (File::exists($oldPdf)) {
                File::delete($oldPdf);
            }
        }

        $product->name            = $request->name;
        $product->description     = $request->description;
        $product->details_product = $request->details_product;
        $product->category_id     = $request->category_id;
        $product->images          = $imageName;
        $product->pdf             = $pdfName;
        $product->alt_text        = $request->alt_text;

        if ($request->filled('slug')) {
            $product->slug = Str::slug($request->slug);
        } else {
            $product->slug = Str::slug($request->name);
        }

        // Setelah update, set status kembali ke 'pending'
        $product->status = 'pending';

        $product->save();

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil diperbarui dan menunggu persetujuan admin.');
    }

    // Menghapus produk
    public function destroy($id)
    {
        $product = Product::where('id', $id)->where('seller_id', Auth::id())->firstOrFail();

        // Hapus gambar
        $imagePath = public_path('images/' . $product->images);
        if (File::exists($imagePath)) {
            File::delete($imagePath);
        }

        // Hapus PDF
        $pdfPath = public_path('pdfs/' . $product->pdf);
        if (File::exists($pdfPath)) {
            File::delete($pdfPath);
        }

        $product->delete();

        return redirect()->route('seller.products.index')->with('success', 'Produk berhasil dihapus.');
    }
}
