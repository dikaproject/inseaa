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
    public function show($sellerId)
    {
        // Find the seller by ID, eager load sellerProfile
        $seller = User::with('sellerProfile')->findOrFail($sellerId);

        // Extract sellerProfile
        $sellerProfile = $seller->sellerProfile;

        // Get additional data like approved and sold products count
        $approvedProductsCount = $seller->products()->where('status', 'approved')->count();
        $soldProductsCount = $seller->products()->where('status', 'sold')->count();

        return view('admin.seller.detail', compact('seller', 'sellerProfile', 'approvedProductsCount', 'soldProductsCount'));
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
