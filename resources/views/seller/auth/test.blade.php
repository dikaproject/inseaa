<header class="rn-header haeder-default header--sticky">
    <div class="container">
        <div class="header-inner">
            <div class="header-left">
                <div class="logo-thumbnail logo-custom-css">
                    <a class="logo-light" href="index.html"><img src="assets/images/logoinseaa.png" alt="nft-logo"></a>
                    <a class="logo-dark" href="index.html"><img src="assets/images/logoinseaa.png" alt="nft-logo"></a>
                </div>
                <div class="mainmenu-wrapper">
                    <nav id="sideNav" class="mainmenu-nav d-none d-xl-block">
                        <!-- Start Mainmanu Nav -->
                        <ul class="mainmenu">
                            <li class="has-menu-child-item">
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li><a href="{{url('/about')}}">About</a>
                            </li>
                            <li class="has-menu-child-item">
                                <a href="{{ route('view.products.index') }}">Product</a>
                            </li>
                            <li class="has-menu-child-item">
                            </li>
                            <li><a href="{{url('/contact')}}">Contact</a></li>
                            <li class="has-menu-child-item">
                                <a href="{{url('/blog')}}">Blog</a>
                            </li>
                        </ul>
                        <!-- End Mainmanu Nav -->
                    </nav>
                </div>
            </div>
            <div class="header-right">
                <div class="setting-option d-none d-lg-block">
                    <form class="search-form-wrapper" action="#">
                        <input type="search" placeholder="Search Here" aria-label="Search">
                        <div class="search-icon">
                            <button><i class="feather-search"></i></button>
                        </div>
                    </form>
                </div>
                <div class="setting-option rn-icon-list d-block d-lg-none">
                    <div class="icon-box search-mobile-icon">
                        <button><i class="feather-search"></i></button>
                    </div>
                    <form id="header-search-1" action="#" method="GET" class="large-mobile-blog-search">
                        <div class="rn-search-mobile form-group">
                            <button type="submit" class="search-button"><i class="feather-search"></i></button>
                            <input type="text" placeholder="Search ...">
                        </div>
                    </form>
                </div>
                <div class="setting-option rn-icon-list notification-badge">

                </div>
                <div class="setting-option rn-icon-list notification-badge">
                    <div class="icon-box">
                        <a href="{{ route('cart.view') }}">
                            <i class="feather-shopping-cart"></i>
                            <span class="badge">{{ count(session('cart', [])) }}</span>
                        </a>
                    </div>
                </div>

                <div class="header_admin" id="header_admin">
                    <div class="setting-option rn-icon-list user-account">
                        <div class="icon-box">
                            <a href="author.html"><img src="assets/images/icons/boy-avater.png" alt="Images"></a>
                            <div class="rn-dropdown">
                                <div class="rn-inner-top">
                                    <h4 class="title"><a href="product-details.html">Christopher William</a></h4>
                                    <span><a href="#">Set Display Name</a></span>
                                </div>
                                <div class="rn-product-inner">
                                    <ul class="product-list">
                                        <li class="single-product-list">
                                            <div class="thumbnail">
                                                <a href="product-details.html"><img src="assets/images/portfolio/portfolio-07.jpg" alt="Nft Product Images"></a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="product-details.html">Balance</a></h6>
                                                <span class="price">25 ETH</span>
                                            </div>
                                            <div class="button"></div>
                                        </li>
                                        <li class="single-product-list">
                                            <div class="thumbnail">
                                                <a href="product-details.html"><img src="assets/images/portfolio/portfolio-01.jpg" alt="Nft Product Images"></a>
                                            </div>
                                            <div class="content">
                                                <h6 class="title"><a href="product-details.html">Balance</a></h6>
                                                <span class="price">25 ETH</span>
                                            </div>
                                            <div class="button"></div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="add-fund-button mt--20 pb--20">
                                    <a class="btn btn-primary-alta w-100" href="connect.html">Add Your More Funds</a>
                                </div>
                                <ul class="list-inner">
                                    <li><a href="author.html">My Profile</a></li>
                                    <li><a href="edit-profile.html">Edit Profile</a></li>
                                    <li><a href="connect.html">Manage funds</a></li>
                                    <li><a href="login.html">Sign Out</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="setting-option mobile-menu-bar d-block d-xl-none">
                    <div class="hamberger">
                        <button class="hamberger-button">
                            <i class="feather-menu"></i>
                        </button>
                    </div>
                </div>

                <div id="my_switcher" class="my_switcher setting-option">
                    <ul>
                        <li>
                            <a href="javascript: void(0);" data-theme="light" class="setColor light">
                                <img class="sun-image" src="assets/images/icons/sun-01.svg" alt="Sun images">
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" data-theme="dark" class="setColor dark">
                                <img class="Victor Image" src="assets/images/icons/vector.svg" alt="Vector Images">
                            </a>
                        </li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
</header>
<!-- start page title area -->
<div class="rn-breadcrumb-inner ptb--30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <h5 class="title text-center text-md-start">Nuron Login</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-list">
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="separator"><i class="feather-chevron-right"></i></li>
                    <li class="item current">Nuron Login</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end page title area -->
  <!-- login form -->
  <div class="login-area rn-section-gapTop">
    <div class="container">
        <div class="row g-5">
            <div class=" offset-2 col-lg-4 col-md-6 ml_md--0 ml_sm--0 col-sm-12">
                <div class="form-wrapper-one">
                    <h4>Login</h4>
                    <form>
                        <div class="mb-5">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" id="exampleInputEmail1">
                        </div>
                        <div class="mb-5">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" id="exampleInputPassword1">
                        </div>
                        <div class="mb-5 rn-check-box">
                            <input type="checkbox" class="rn-check-box-input" id="exampleCheck1">
                            <label class="rn-check-box-label" for="exampleCheck1">Remember me leter</label>
                        </div>
                        <button type="submit" class="btn btn-primary mr--15">Log In</button>
                        <a href="sign-up.html" class="btn btn-primary-alta">Sign Up</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- login form end -->
<div class="rn-footer-one rn-section-gap bg-color--1 mt--100 mt_md--80 mt_sm--80">
    <div class="container">
        <div class="row gx-5">
            <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                <div class="widget-content-wrapper">
                    <div class="footer-left">
                        <div class="logo-thumbnail logo-custom-css">
                            <a class="logo-light" href="index.html"><img src="assets/images/logoinseaa.png" alt="nft-logo"></a>
                            <a class="logo-dark" href="index.html"><img src="assets/images/logoinseaa.png" alt="nft-logo"></a>
                        </div>
                        <p class="rn-footer-describe">
                            Created with the collaboration of over 60 of the world's best Inseaa Artists.
                        </p>
                    </div>
                    <div class="widget-bottom mt--40 pt--40">
                        <h6 class="title">Get The Latest Inseaa Updates </h6>
                        <div class="input-group">
                            <input type="text" class="form-control bg-color--2" placeholder="Your username" aria-label="Recipient's username">
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
                    <ul class="footer-list-one">
                        @foreach ($categories->take(4) as $category)
                        <li class="single-list"><a href="{{ route('category.detail', $category->slug) }}">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
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
<!-- Start Footer Area -->
<div class="copy-right-one ptb--20 bg-color--1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="copyright-left">
                    <span>©2024 Inseaa, Inc. All rights reserved.</span>
                    <ul class="privacy">
                        <li><a href="terms-condition.html">Terms</a></li>
                        <li><a href="privacy-policy.html">Privacy Policy</a></li>
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
<!-- End Footer Area -->
<div class="mouse-cursor cursor-outer"></div>
<div class="mouse-cursor cursor-inner"></div>
<!-- Start Top To Bottom Area  -->
<div class="rn-progress-parent">
    <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
