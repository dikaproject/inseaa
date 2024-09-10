<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home Default || Inseaa</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description"
        content="INSEAA (Indonesian Student Exporters Association in Australia) is an independent
    export association directly guided by the Ministry of Trade of Indonesia.">
    <meta name="keywords" content="inseaa, Exporters, technology, indonesian Exporters">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="theme-style-mode" content="1"> <!-- 0 == light, 1 == dark -->

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/logoinseaa.png') }}">
    <!-- CSS
    ============================================ -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/feature.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/odometer.css') }}">
    <style>
        #search-results {
            position: absolute;
            background: white;
            border: 1px solid #ddd;
            max-height: 300px;
            overflow-y: auto;
            width: 100%;
            z-index: 1000;
            padding: 10px;
        }

        .search-result-item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .search-result-link {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: inherit;
        }

        .search-result-content {
            display: flex;
            align-items: center;
        }

        .search-result-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
            margin-right: 10px;
        }

        .search-result-details {
            display: flex;
            flex-direction: column;
        }

        .product-name {
            font-size: 16px;
            font-weight: bold;
            margin: 0;
        }

        .product-category {
            font-size: 12px;
            color: #888;
        }
    </style>

    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!-- Spinner Start -->

    <!-- Spinner End -->

    <!-- Header Start -->
    @include('layouts.nav-user')
    <!-- Header End -->



    <!-- Content Layouting Page -->
    {{-- <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-end">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">Your Cart</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($cartItems->isEmpty())
                        <p>Your cart is empty.</p>
                    @else
                        <ul class="list-group">
                            @foreach ($cartItems as $cartItem)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <img src="{{ asset('images/' . $cartItem->product->images) }}"
                                        alt="{{ $cartItem->product->alt_text }}"
                                        style="width: 50px; height: 50px; object-fit: cover;">
                                    <div>
                                        <h6>{{ $cartItem->product->name }}</h6>
                                        <p>Category: {{ $cartItem->product->category->name }}</p>
                                    </div>
                                    <span class="badge bg-primary">{{ $cartItem->quantity }}</span>
                                    <!-- Form untuk mengupdate quantity -->
                                    <form action="{{ route('cart.update', $cartItem->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('PATCH')
                                        <input type="number" name="quantity" value="{{ $cartItem->quantity }}"
                                            min="1" class="form-control form-control-sm d-inline w-auto">
                                        <button type="submit" class="btn btn-primary btn-sm">Update</button>
                                    </form>
                                    <!-- Form untuk menghapus item dari cart -->
                                    <form action="{{ route('cart.remove', $cartItem->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="#" class="btn btn-primary">Checkout</a>
                </div>
            </div>
        </div>
    </div> --}}
    @yield('landing-page')
    @yield('about')
    @yield('allcategory')
    @yield('contact')
    @yield('allproduct')
    @yield('product-details')
    @yield('blog')
    @yield('blogdetail')
    @yield('detailcategory')




    <!-- Content Layouting Page End -->

    <!-- Footer Start -->
    @include('layouts.footer-user')
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-0 back-to-top"><i
            class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/modernizer.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/feather.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sal.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/particles.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.style.swicher.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/count-down.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/isotop.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/imageloaded.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/backtoTop.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/odometer.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-appear.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/scrolltrigger.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.custom-file-input.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/savePopup.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/vanilla.tilt.js') }}"></script>

    <!-- main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Meta Mask  -->
    <script src="{{ asset('assets/js/vendor/web3.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/maralis.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/nft.js') }}"></script>

    <script>
        document.getElementById('search-input').addEventListener('input', function() {
            let searchTerm = this.value;

            if (searchTerm.length > 2) {
                // Lakukan AJAX request ke server
                fetch(`/search-product?term=${searchTerm}`)
                    .then(response => response.json())
                    .then(data => {
                        let searchResults = document.getElementById('search-results');
                        searchResults.innerHTML = ''; // Kosongkan hasil sebelumnya
                        searchResults.style.display = 'block';

                        if (data.length > 0) {
                            data.forEach(product => {
                                searchResults.innerHTML += `
                            <div class="dropdown-item search-result-item">
                                <a href="/products/${product.slug}" class="search-result-link">
                                    <div class="search-result-content">
                                        <img src="{{ asset('images/') }}/${product.images}" alt="${product.alt_text}" class="search-result-image">
                                        <div class="search-result-details">
                                            <h5 class="product-name">${product.name}</h5>
                                            <p class="product-category">${product.category.name}</p>
                                        </div>
                                    </div>
                                </a>
                            </div>`;
                            });
                        } else {
                            searchResults.innerHTML = `<p class="dropdown-item">No products found</p>`;
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            } else {
                document.getElementById('search-results').style.display =
                    'none'; // Sembunyikan dropdown jika input kosong
            }
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const cartIcon = document.querySelector('.feather-shopping-cart .badge');

            // Fungsi untuk memperbarui jumlah item di cart
            function updateCartCount() {
                fetch('/cart')
                    .then(response => response.json())
                    .then(data => {
                        cartIcon.innerText = data.cartCount;
                    });
            }

            // Menambahkan item ke cart
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    const productId = this.dataset.productId;

                    fetch('/cart/add', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute('content')
                            },
                            body: JSON.stringify({
                                product_id: productId
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                updateCartCount();
                            }
                        });
                });
            });

            // Inisialisasi jumlah item di cart saat halaman dimuat
            updateCartCount();
        });
    </script>

</body>

</html>
