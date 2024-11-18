<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderPlaced;
use App\Models\Category;
use App\Mail\AdminOrderPlaced;
use App\Mail\SellerOrderPlaced;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::with('images')->findOrFail($id); // Mengambil produk berdasarkan ID

        $cart = session()->get('cart', []);

        $imagePath = $product->images->first()->image_path ?? 'placeholder.png';

        // Jika cart sudah memiliki produk ini, tambahkan quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            // Jika belum ada, tambahkan ke cart
            $cart[$id] = [
                'name' => $product->name,
                'description' => $product->description, // Menambahkan deskripsi produk
                'quantity' => 1,
                'image' => $imagePath, // Pastikan field image ada di tabel products
            ];
        }

        session()->put('cart', $cart); // Simpan cart ke session

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $categories = Category::all();

        return view('cart.index', compact('cart', 'categories'));
    }

    public function removeFromCart($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->route('cart.view')->with('success', 'Item removed from cart.');
    }

    public function updateQuantity(Request $request, $id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = max(1, $request->input('quantity')); // Minimum quantity 1
            session()->put('cart', $cart);
        }

        return response()->json(['success' => true]);
    }

    public function checkout(Request $request)
{
    $cart = session()->get('cart', []);

    // Simpan data order ke database
    $order = Order::create([
        'name' => $request->name,
        'email' => $request->email,
        'subject' => $request->subject,
        'message' => $request->message,
    ]);

    // Simpan item cart ke order_items
    foreach ($cart as $productId => $details) {
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $details['quantity'],
        ]);
    }

    // Hapus session cart
    session()->forget('cart');

    // Kirim email konfirmasi ke customer
    Mail::to($request->email)->send(new OrderPlaced($order));

    // Kirim email ke admin
    Mail::to('inseaaid@gmail.com')->send(new AdminOrderPlaced($order));

    // Kirim email ke seller
    foreach ($order->items as $item) {
        $seller = $item->product->seller; // Ambil informasi seller dari produk
        Mail::to($seller->email)->send(new SellerOrderPlaced($order, $seller));
    }

    return redirect()->route('view.products.index')->with('success', 'Your order has been placed.');
}

}
