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
