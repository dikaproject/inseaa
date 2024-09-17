<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use App\Models\SellerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;

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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'no_telepon' => 'required|string|max:15',
            'alamat' => 'required|string|max:255',
        ]);

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Assign role seller
        $user->assignRole('seller');

        // Simpan data seller profile
        SellerProfile::create([
            'user_id' => $user->id,
            'no_telepon' => $request->no_telepon,
            'alamat' => $request->alamat,
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
        // Validasi kredensial (hanya email dan password untuk Auth::attempt)
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Opsi 'remember me'
        $remember = $request->has('remember') ? true : false;

        // Lakukan autentikasi hanya dengan email dan password
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            if (Auth::user()->hasRole('seller')) {
                // Mendapatkan waktu saat ini dalam UTC
                $lastLoginTimeUTC = Carbon::now('UTC');

                // Validasi data tambahan
                $request->validate([
                    'timezone' => 'required|string',
                    'device_info' => 'required|string',
                    'latitude' => 'required|numeric',
                    'longitude' => 'required|numeric',
                ]);

                // Mendapatkan data dari request
                $timezone = $request->input('timezone');
                $deviceInfo = $request->input('device_info');
                $latitude = $request->input('latitude');
                $longitude = $request->input('longitude');

                // Format waktu berdasarkan zona waktu pengguna
                try {
                    $formattedLoginTime = $lastLoginTimeUTC->copy()->setTimezone($timezone)->format('Y-m-d H:i:s');
                } catch (\Exception $e) {
                    // Jika zona waktu tidak valid, gunakan UTC
                    $formattedLoginTime = $lastLoginTimeUTC->format('Y-m-d H:i:s');
                }

                // Mendapatkan IP pengguna
                $userIp = $request->header('X-Forwarded-For') ?? $request->ip();

                // Melakukan geocoding untuk mendapatkan nama lokasi (opsional)
                $geocodedLocation = $this->getLocationName($latitude, $longitude);

                // Menyimpan informasi ke database seller profile
                $sellerProfile = Auth::user()->sellerProfile;
                $sellerProfile->update([
                    'timezone' => $timezone,
                    'device_info' => $deviceInfo,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'last_login_time' => $formattedLoginTime,
                    'last_login_ip' => $userIp,
                    'last_location' => $geocodedLocation,
                ]);

                // Menyimpan informasi ke session (opsional)
                session([
                    'last_login_time' => $formattedLoginTime,
                    'last_login_ip' => $userIp,
                    'last_device_used' => $deviceInfo,
                    'last_location' => $geocodedLocation,
                ]);

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

    /**
     * Mendapatkan nama lokasi berdasarkan latitude dan longitude menggunakan Google Geocoding API
     *
     * @param float $latitude
     * @param float $longitude
     * @return string|null
     */
    protected function getLocationName($latitude, $longitude)
{
    $apiKey = config('services.google.geocoding_api_key');

    $response = Http::get('https://maps.googleapis.com/maps/api/geocode/json', [
        'latlng' => "{$latitude},{$longitude}",
        'key'    => $apiKey,
    ]);

    if ($response->successful()) {
        $data = $response->json();

        if (!empty($data['results'])) {
            $components = $data['results'][0]['address_components'];

            // Urutkan komponen berdasarkan preferensi: locality, admin_area_level_1, country
            foreach ($components as $component) {
                if (in_array('locality', $component['types'])) {
                    return $component['long_name']; // Nama kota
                }
                if (in_array('administrative_area_level_1', $component['types'])) {
                    return $component['long_name']; // Nama provinsi atau wilayah
                }
                if (in_array('country', $component['types'])) {
                    return $component['long_name']; // Nama negara sebagai fallback
                }
            }
        }
    }

    return null; // Jika gagal mendapatkan lokasi
}

    // Halaman dashboard seller
    public function dashboard()
{
    // Mendapatkan data seller yang login
    $seller = Auth::user();

    // Mendapatkan profil seller
    $sellerProfile = $seller->sellerProfile;

    // Menghitung jumlah produk yang diapprove
    $approvedProductsCount = Product::where('seller_id', $seller->id)
                                    ->where('status', 'approved')
                                    ->count();

    // Menghitung jumlah produk yang sudah dibeli (berdasarkan order_items)
    $soldProductsCount = OrderItem::whereHas('product', function($query) use ($seller) {
        $query->where('seller_id', $seller->id);
    })->sum('quantity');

    // Mendapatkan aktivitas produk (kapan produk di-upload, status approved/rejected)
    $activities = Product::where('seller_id', $seller->id)
                        ->orderBy('created_at', 'desc')
                        ->get();

    // Mengirim data ke view
    return view('seller.dashboard', compact('sellerProfile', 'approvedProductsCount', 'soldProductsCount', 'activities'));
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
