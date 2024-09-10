<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $user = auth()->user();
        $product = Product::findOrFail($request->product_id);

        $cartItem = CartItem::updateOrCreate(
            ['user_id' => $user->id, 'product_id' => $product->id],
            ['quantity' => DB::raw('quantity + 1')]
        );

        return response()->json(['success' => true]);
    }

    public function index()
    {
        $user = auth()->user();
        $cartItems = CartItem::with('product')->where('user_id', $user->id)->get();

        return view('cart.index', compact('cartItems'));
    }

    public function remove($id)
    {
        CartItem::findOrFail($id)->delete();
        return redirect()->route('cart.index');
    }
}
