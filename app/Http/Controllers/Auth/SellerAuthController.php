<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\SellerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SellerAuthController extends Controller
{
    // Menampilkan form registrasi seller
    public function showRegisterForm()
    {
        return view('seller.auth.register');
    }

    // Proses registrasi seller
    public function register(Request $request)
    {
        $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:users',
            'password'   => ['required', 'confirmed', Rules\Password::defaults()],
            'no_telepon' => 'required|string|max:15',
            'alamat'     => 'required|string|max:255',
        ]);

        // Buat user baru
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign role seller
        $user->assignRole('seller');

        // Simpan data seller profile
        SellerProfile::create([
            'user_id'    => $user->id,
            'no_telepon' => $request->no_telepon,
            'alamat'     => $request->alamat,
        ]);

        // Login user
        Auth::login($user);

        return redirect()->route('seller.dashboard');
    }

    // Proses login seller
    // Menampilkan form login seller
    public function showLoginForm()
    {
        return view('seller.auth.login');
    }

    // Proses login seller
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Opsi 'remember me'
        $remember = $request->has('remember') ? true : false;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (Auth::user()->hasRole('seller')) {
                return redirect()->intended(route('seller.dashboard'));
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Anda tidak memiliki akses sebagai seller.',
                ]);
            }
        }

        return back()->withErrors([
            'email' => 'Kredensial tersebut tidak cocok dengan data kami.',
        ]);
    }

    // Halaman dashboard seller
    public function dashboard()
    {
        $sellerProfile = Auth::user()->sellerProfile;
        return view('seller.dashboard', compact('sellerProfile'));
    }

    // Proses logout seller
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('seller.login');
    }
}
