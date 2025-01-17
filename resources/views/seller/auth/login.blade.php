<!-- resources/views/seller/auth/login.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login Seller || Inseaa</title>
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

    <!-- Style css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<body>
    <!-- Header Start -->
    <!-- Header End -->

    <!-- Page Title Area Start -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title">Inseaa Seller Login</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><i class="feather-chevron-right"></i></li>
                        <li class="current">Inseaa Seller Login</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Title Area End -->

    <!-- Login Form Start -->
    <div class="login-area rn-section-gapTop d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="container">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="form-wrapper-one">
                        <h4>Login</h4>
                        <form id="login-form" action="{{ route('seller.login') }}" method="POST">
                            @csrf
                            <!-- Tampilkan pesan error jika ada -->
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-4">
                                <label for="email" class="form-label">Email address</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan Email Anda" required value="{{ old('email') }}">
                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Masukkan Password Anda" required>
                            </div>
                            <div class="mb-4 d-flex justify-content-between">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="rememberMe">Remember Me</label>
                                </div>
                                <a href="{{ route('password.request') }}" class="text-primary">Forgot Password?</a>
                            </div>
                            <!-- Hidden Fields -->
                            <input type="hidden" name="timezone" id="timezone">
                            <input type="hidden" name="device_info" id="device_info">
                            <input type="hidden" name="latitude" id="latitude">
                            <input type="hidden" name="longitude" id="longitude">
                            <button type="submit" class="btn btn-primary w-100">Log In</button>
                        </form>
                        <div class="mt-4 text-center">
                            <span>Or</span>
                            <div class="d-flex justify-content-center gap-2 mt-2">
                                <!-- Tambahkan opsi login lain jika diperlukan -->
                            </div>
                        </div>
                        <div class="mt-4 text-center">
                            <a href="{{ route('seller.register') }}" class="btn btn-secondary">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Form End -->

    <!-- Footer Start -->
    <div class="rn-footer-one rn-section-gap bg-color--1 mt--100 mt_md--80 mt_sm--80">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="widget-content-wrapper">
                        <div class="footer-left">
                            <div class="logo-thumbnail logo-custom-css">
                                <a class="logo-light" href="{{ url('/') }}"><img src="{{ asset('assets/images/logoinseaa.png') }}" alt="nft-logo"></a>
                                <a class="logo-dark" href="{{ url('/') }}"><img src="{{ asset('assets/images/logoinseaa.png') }}" alt="nft-logo"></a>
                            </div>
                            <p class="rn-footer-describe">
                                Created with the collaboration of over 60 of the world's best Inseaa Artists.
                            </p>
                        </div>
                        <div class="widget-bottom mt--40 pt--40">
                            <h6 class="title">Get The Latest Inseaa Updates </h6>
                            <div class="input-group">
                                <input type="email" class="form-control bg-color--2" placeholder="Your email" aria-label="Recipient's email" required>
                                <div class="input-group-append">
                                    <button class="btn btn-primary-alta btn-outline-secondary" type="button">Subscribe</button>
                                </div>
                            </div>
                            <div class="newsletter-dsc">
                                <p>Email is safe. We don't spam.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_mobile--40">
                    <div class="footer-widget widget-quicklink">
                        <h6 class="widget-title">Inseaa Category</h6>
                        <!-- Tambahkan link kategori jika ada -->
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mt_md--40 mt_sm--40">
                    <div class="footer-widget widget-information">
                        <h6 class="widget-title">Information</h6>
                        <ul class="footer-list-one">
                            <li class="single-list"><a href="{{ url('/') }}">Home</a></li>
                            <li class="single-list"><a href="{{ url('about') }}">About</a></li>
                            <li class="single-list"><a href="{{ route('view.products.index') }}">Product</a></li>
                            <li class="single-list"><a href="{{ url('contact') }}">Contact</a></li>
                            <li class="single-list"><a href="{{ url('blog') }}">Blog</a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Footer Area -->

    <!-- Copy Right Area -->
    <div class="copy-right-one ptb--20 bg-color--1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="copyright-left">
                        <span>©2024 Inseaa, Inc. All rights reserved.</span>
                        <ul class="privacy">
                            <li><a href="{{ url('terms-condition') }}">Terms</a></li>
                            <li><a href="{{ url('privacy-policy') }}">Privacy Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="copyright-right">
                        <ul class="social-copyright">
                            <li><a href="#"><i data-feather="facebook"></i></a></li>
                            <li><a href="#"><i data-feather="twitter"></i></a></li>
                            <li><a href="#"><i data-feather="instagram"></i></a></li>
                            <li><a href="#"><i data-feather="linkedin"></i></a></li>
                            <li><a href="#"><i data-feather="mail"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copy Right Area -->

    <div class="mouse-cursor cursor-outer"></div>
    <div class="mouse-cursor cursor-inner"></div>
    <!-- Start Top To Bottom Area  -->
    <div class="rn-progress-parent">
        <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>


    <!-- JavaScript Files -->
    <script src="{{ asset('assets/js/vendors.min.js') }}"></script>
    <script src="{{ asset('assets/js/common-init.min.js') }}"></script>
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

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- Meta Mask  -->
    <script src="{{ asset('assets/js/vendor/web3.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/maralis.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/nft.js') }}"></script>

    <!-- Geolocation and Form Handling Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Mendapatkan Zona Waktu
            var timezone = Intl.DateTimeFormat().resolvedOptions().timeZone;
            document.getElementById('timezone').value = timezone;

            // Mendapatkan Informasi Perangkat
            var deviceInfo = navigator.userAgent;
            document.getElementById('device_info').value = deviceInfo;

            // Mendapatkan Lokasi GPS (Latitude dan Longitude)
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(function(position) {
                    document.getElementById('latitude').value = position.coords.latitude;
                    document.getElementById('longitude').value = position.coords.longitude;
                }, function(error) {
                    alert('Akses lokasi diperlukan untuk login.');
                    // Menonaktifkan form jika lokasi tidak diizinkan
                    document.getElementById('login-form').submit = function() {
                        return false;
                    };
                });
            } else {
                alert('Geolocation is not supported by your browser.');
            }

            // Validasi sebelum submit
            document.getElementById('login-form').addEventListener('submit', function(e) {
                // Pastikan lokasi sudah diisi
                if (!document.getElementById('latitude').value || !document.getElementById('longitude').value) {
                    e.preventDefault();
                    alert('Akses lokasi diperlukan untuk login.');
                }
            });
        });
    </script>


</body>
</html>
