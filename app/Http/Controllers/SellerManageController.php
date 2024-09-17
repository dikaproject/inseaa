<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SellerManageController extends Controller
{
    //
    public function index()
    {
        // Ambil semua seller yang memiliki role 'seller'
        $sellers = User::role('seller')->with('sellerProfile')->get();

        return view('admin.seller.index', compact('sellers'));
    }

    // Tampilkan detail seller
    public function show(User $seller)
    {
        // Pastikan user memiliki role 'seller'
        if (!$seller->hasRole('seller')) {
            return redirect()->route('admin.sellers.index')->withErrors('User bukan seller.');
        }

        $approvedProductsCount = Product::where('seller_id', $seller->id)
            ->where('status', 'approved')
            ->count();

        // Menghitung jumlah produk yang sudah dibeli (berdasarkan order_items)
        $soldProductsCount = OrderItem::whereHas('product', function ($query) use ($seller) {
            $query->where('seller_id', $seller->id);
        })->sum('quantity');

        // Ambil profil seller
        $sellerProfile = $seller->sellerProfile;

        return view('admin.seller.detail', compact('seller', 'sellerProfile','approvedProductsCount', 'soldProductsCount'));
    }

    // Form untuk mengedit seller
    public function edit(User $seller)
    {
        return view('admin.seller.edit', compact('seller'));
    }

    // Proses update data seller
    public function update(Request $request, User $seller)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $seller->id,
            // Tambahkan validasi lain jika diperlukan
        ]);

        $seller->update($request->only('name', 'email'));

        return redirect()->route('admin.sellers.index')->with('success', 'Seller updated successfully.');
    }

    // Hapus seller
    public function destroy(User $seller)
    {
        $seller->delete();

        return redirect()->route('admin.sellers.index')->with('success', 'Seller deleted successfully.');
    }
}
