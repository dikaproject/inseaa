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
    <meta name="csrf-token" content="{{ csrf_token() }}">


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

    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <!-- Spinner Start -->

    <!-- Spinner End -->

    <!-- Header Start -->
    @include('layouts.nav-user')
    <!-- Header End -->


    @yield('landing-page')
    @yield('about')
    @yield('allcategory')
    @yield('contact')
    @yield('allproduct')
    @yield('product-details')
    @yield('blog')
    @yield('blogdetail')
    @yield('detailcategory')
    @yield('cart')




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

    @yield('script-js')

</body>

</html>
