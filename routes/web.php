<?php

use App\Models\Slider;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AttachmentController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TestimonialController;
use Spatie\Analytics\Facades\Analytics;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// welcome
Route::get('/home', function () {
    $products = App\Models\Product::all();
    $sliders = App\Models\Slider::all();
    $testimonials = App\Models\Testimonial::all();
    $categories = App\Models\Category::all();
    return view('welcome', compact(['products', 'sliders', 'testimonials', 'categories']));
});

Route::get('/', function () {
    $products = App\Models\Product::all();
    $sliders = App\Models\Slider::all();
    $testimonials = App\Models\Testimonial::all();
    $categories = App\Models\Category::all();
    return view('welcome', compact(['products', 'sliders', 'testimonials', 'categories']));
});

Route::get('/admin', function () {
    return view('admin.login');
});

// Route::get('/home', function () {
//     $products = App\Models\Product::all();
//     $sliders = App\Models\Slider::all();
//     $testimonials = App\Models\Testimonial::all();
//     return view('welcome', compact(['products', 'sliders', 'testimonials']));
// })->middleware(['auth', 'verified'])->name('landingpage');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/* admin routes */
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin_dashboard');
    Route::post('/change-password', [AdminController::class, 'changePassword'])->name('admin.change_password');
});

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'login'])->name('admin_login');
    Route::post('/login-submit', [AdminController::class, 'login_submit'])->name('admin_login_submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin_logout');
});


// Dashboard Route
Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', function () {
        $products = App\Models\Product::all();
        return view('admin.dashboard', compact('products'));
    })->name('dashboard');

    // index product Route
    Route::get('/products', function () {
        $products = App\Models\Product::all();
        $attachments = App\Models\Attachment::all();
        return view('admin.products.index', compact('products', 'attachments'));
    })->name('products');

    // index Sliders Route
    Route::get('/sliders', function () {
        $products = App\Models\Product::all();
        return view('admin.sliders.index', compact('sliders'));
    })->name('sliders');

    // index Contacts Route
    Route::get('/contacts', function () {
        $contacts = App\Models\Contact::all();
        return view('admin.contacts', compact('contacts'));
    })->name('contacts');

    // index Testimonial Route
    Route::get('/testimonial', function () {
        $testimonials = App\Models\Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    })->name('testimonials');

    // index Users Route
    Route::get('/users', function () {
        $users = App\Models\User::all();
        return view('admin.user.index', compact('users'));
    })->name('users');

    // index Categories Route
    Route::get('/category', function () {
        $categories = App\Models\Category::all();
        return view('admin.categories.index', compact('categories'));
    })->name('categories');

    // testing template routes
    Route::get('/maintanance', function () {
        return view('admin.maintanance');
    });
    Route::get('/signin', function () {
        return view('admin.signin');
    });
    Route::get('/signup', function () {
        return view('admin.signup');
    });
    Route::get('/settings', function () {
        return view('admin.user.settings');
    });
});

// Product CRUD Routes
Route::middleware(['admin'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'index'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/admin/products', [ProductController::class, 'store'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::put('/admin/products/{product}', [ProductController::class, 'update'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [ProductController::class, 'destroy'])->name('admin.products.destroy');
});


// Detail product
Route::get('/products/{product:slug}', [ProductController::class, 'show'])->name('products.show');

// Sliders CRUD Routes
Route::middleware(['admin'])->group(function () {
Route::get('/sliders', [SliderController::class, 'index'])->name('admin.sliders.index');
Route::get('/sliders/create', [SliderController::class, 'create'])->name('admin.sliders.create');
Route::post('/sliders', [SliderController::class, 'store'])->name('admin.sliders.store');
Route::get('/sliders/{slider}/edit', [SliderController::class, 'edit'])->name('admin.sliders.edit');
Route::put('/sliders/{slider}', [SliderController::class, 'update'])->name('admin.sliders.update');
Route::delete('/sliders/{slider}', [SliderController::class, 'destroy'])->name('admin.sliders.destroy');
});

// Testimonial CRUD Routes
Route::middleware(['admin'])->group(function () {
Route::get('/testimonials', [TestimonialController::class, 'index'])->name('admin.testimonials.index');
Route::get('/testimonials/create', [TestimonialController::class, 'create'])->name('admin.testimonials.create');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('admin.testimonials.store');
Route::get('/testimonials/{testimonial}/edit', [TestimonialController::class, 'edit'])->name('admin.testimonials.edit');
Route::put('/testimonials/{testimonial}', [TestimonialController::class, 'update'])->name('admin.testimonials.update');
Route::delete('/testimonials/{testimonial}', [TestimonialController::class, 'destroy'])->name('admin.testimonials.destroy');
});

// Category CRUD Routes
Route::middleware(['admin'])->group(function () {
Route::get('/category', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/category', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/category/{category}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/category/{category}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});

// Contact Form Route
Route::post('/', [ContactController::class, 'store'])->name('contact.store');

// Contact Delete Route
Route::middleware(['admin'])->group(function () {
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
});

Route::get('/categories', [CategoryController::class, 'allcategory'])->name('category.allcategory');
Route::get('/categories/{slug}', [CategoryController::class, 'show'])->name('category.detail');

Route::get("about",function(){
    $categories = App\Models\Category::all();
    $blogs = App\Models\Blog::all();
    return view('layouts.about', compact('categories', 'blogs'));
});

// Route untuk menampilkan semua produk dengan filter kategori
Route::get('allproduct', [ProductController::class, 'view'])->name('view.products.index');


Route::get('/testing', function () {
    return view('testing');
});

Route::get('/contact', function () {
    $categories = App\Models\Category::all();
    return view('layouts.contact', compact('categories'));
});

// attachment routes
Route::prefix('admin')->group(function () {
Route::get('/admin/attachments/create/{productId}', [AttachmentController::class, 'create'])->name('attachments.create');
Route::post('/admin/attachments/store/{productId}', [AttachmentController::class, 'store'])->name('attachments.store');
Route::delete('/admin/products/{productId}/attachments', [ProductController::class, 'deleteAllAttachments'])->name('products.delete_attachments');
});

// media routes
Route::middleware(['admin'])->prefix('admin')->group(function () {
    Route::get('/media', [MediaController::class, 'index'])->name('admin.media.index');
    Route::get('/media/create', [MediaController::class, 'create'])->name('admin.media.create');
    Route::post('/media', [MediaController::class, 'store'])->name('admin.media.store');
    Route::delete('/media/{media}', [MediaController::class, 'destroy'])->name('admin.media.destroy');
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/admin/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('/admin/blog', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/admin/blog/{blog}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/admin/blog/{blog}', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/admin/blog/{blog}', [BlogController::class, 'destroy'])->name('admin.blog.destroy');
});

// view blogs
Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->name('blogs.show');

Route::get('/blog', function () {
    $blogs = App\Models\Blog::all();
    $sliders = App\Models\Slider::all();
    $categories = App\Models\Category::all();
    return view('blogs.index', compact('blogs', 'sliders', 'categories'));
});

Route::get('/detailcategory',function (){
    $categories = App\Models\Category::all();
    return view('category.detail', compact('categories'));
});

//  test google analytics data
use Spatie\Analytics\Period;
Route::get('/analytics', function () {
    // Mengambil instance dari kelas Analytics
    $analytics = Analytics::getFacadeRoot();

    // Mendapatkan data total pengunjung dan tampilan halaman selama 7 hari terakhir
    $totalVisitorsAndPageViews = $analytics->fetchTotalVisitorsAndPageViews(Period::days(7));

    // Mendapatkan data halaman yang paling sering dikunjungi selama 7 hari terakhir
    $mostVisitedPages = $analytics->fetchMostVisitedPages(Period::days(7));

    // Mendapatkan data referer teratas selama 7 hari terakhir
    $topReferrers = $analytics->fetchTopReferrers(Period::days(7));

    // Mendapatkan data browser teratas selama 7 hari terakhir
    $topBrowsers = $analytics->fetchTopBrowsers(Period::days(7));

    // Mendapatkan data sistem operasi teratas selama 7 hari terakhir
    $topOperatingSystems = $analytics->fetchTopOperatingSystems(Period::days(7));

    // Mengembalikan data dalam bentuk JSON
    return response()->json([
        'totalVisitorsAndPageViews' => $totalVisitorsAndPageViews,
        'mostVisitedPages' => $mostVisitedPages,
        'topReferrers' => $topReferrers,
        'topBrowsers' => $topBrowsers,
        'topOperatingSystems' => $topOperatingSystems,
    ]);
});



//  new Feature search
Route::get('/search-product', [ProductController::class, 'searchProduct'])->name('searchProduct');


//  New feature system
// Route untuk menambah produk ke cart
Route::post('/cart/add/{product}', [CartController::class, 'addToCart'])->name('cart.add');
// Route untuk melihat isi cart
Route::get('/cart', [CartController::class, 'viewCart'])->name('cart.view');
// Route untuk checkout dan kirim form
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update/{id}', [CartController::class, 'updateQuantity'])->name('cart.update');

