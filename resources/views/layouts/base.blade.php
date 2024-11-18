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



    <style>
        /* Styles for the search results container */
        .search-results-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            max-height: 400px;
            overflow-y: auto;
            background-color: #fff;
            border: 1px solid #ddd;
            z-index: 1000;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        /* Styles for each search result item */
        .search-result-item {
            display: flex;
            padding: 10px;
            border-bottom: 1px solid #eee;
            align-items: center;
        }

        .search-result-item:last-child {
            border-bottom: none;
        }

        /* Styles for the search result content */
        .search-result-content {
            display: flex;
            align-items: center;
            width: 100%;
        }

        /* Styles for the product image */
        .search-result-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
            margin-right: 10px;
            border-radius: 5px;
        }

        /* Styles for the product details */
        .search-result-details {
            flex: 1;
        }

        .product-name {
            font-size: 16px;
            margin: 0;
            color: #333;
            font-weight: bold;
        }

        .product-category,
        .product-seller {
            font-size: 14px;
            margin: 2px 0;
            color: #777;
        }

        /* Style adjustments for the link */
        .search-result-link {
            text-decoration: none;
            color: inherit;
            width: 100%;
        }
    </style>
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
    @yield('script-js')

    <script>
        document.querySelector('.search-form-wrapper input[type="search"]').addEventListener('input', function() {
            let searchTerm = this.value;

            if (searchTerm.length > 2) {
                // Perform AJAX request to the server
                fetch(`/search-product?term=${encodeURIComponent(searchTerm)}`)
                    .then(response => response.json())
                    .then(data => {
                        let searchResults = document.querySelector('.search-results-dropdown');

                        searchResults.innerHTML = ''; // Clear previous results
                        searchResults.style.display = 'block';

                        if (data.length > 0) {
                            data.forEach(product => {
                                // Get the first image from the product's images array
                                let imageSrc = product.images.length > 0 ?
                                    `/images/${product.images[0].image_path}` :
                                    '/images/default.jpg'; // Provide a default image if none exist

                                let altText = product.images.length > 0 ?
                                    product.images[0].alt_text :
                                    'No image available';

                                let sellerName = product.seller && product.seller.name ?
                                    product.seller.name :
                                    'Unknown Seller';

                                searchResults.innerHTML += `
                                    <div class="dropdown-item search-result-item">
                                        <a href="/products/${product.slug}" class="search-result-link">
                                            <div class="search-result-content">
                                                <img src="${imageSrc}" alt="${altText}" class="search-result-image">
                                                <div class="search-result-details">
                                                    <h5 class="product-name">${product.name}</h5>
                                                    <p class="product-category">Category: ${product.category.name}</p>
                                                    <p class="product-seller">Seller: ${sellerName}</p>
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
                let searchResults = document.querySelector('.search-results-dropdown');
                searchResults.style.display = 'none'; // Hide dropdown if input is empty
            }
        });
    </script>


</body>

</html>
