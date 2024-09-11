@extends('layouts.base')

@section('title', 'Home')

@section('landing-page')

<div class="popup-mobile-menu">
    <div class="inner">
        <div class="header-top">
            <div class="logo logo-custom-css">
                <a class="logo-light" href="index.html"><img src="assets/images/logoinseaa.png" alt="nft-logo"></a>
                <a class="logo-dark" href="index.html"><img src="assets/images/logoinseaa.png" alt="nft-logo"></a>
            </div>
            <div class="close-menu">
                <button class="close-button">
                    <i class="feather-x"></i>
                </button>
            </div>
        </div>
        <nav>
            <!-- Start Mainmanu Nav -->
            <ul class="mainmenu">
                <li class="has-droupdown">
                    <a class="nav-link its_new" href="#">Home</a>
                    <ul class="submenu">
                    </ul>
                </li>
                <li><a href="about.html">About</a>
                </li>
                <li class="has-droupdown">
                    <a class="nav-link its_new" href="#">Explore</a>
                    <ul class="submenu">
                        <li><a href="explore-one.html">Explore Filter<i class="feather-fast-forward"></i></a></li>
                        <li><a href="explore-two.html">Explore Isotop<i class="feather-fast-forward"></i></a></li>
                        <li><a href="explore-three.html">Explore Carousel<i class="feather-fast-forward"></i></a></li>
                        <li><a href="explore-four.html">Explore Simple<i class="feather-fast-forward"></i></a></li>
                        <li><a href="explore-five.html">Explore Place Bid<i class="feather-fast-forward"></i></a></li>
                        <li><a href="explore-six.html">Place Bid With Filter<i class="feather-fast-forward"></i></a></li>
                        <li><a href="explore-seven.html">Place Bid With Isotop<i class="feather-fast-forward"></i></a></li>
                        <li><a href="explore-eight.html">Place Bid With Carousel<i class="feather-fast-forward"></i></a></li>
                        <li><a href="explore-list-style.html">Explore Style List<i class="feather-fast-forward"></i></a></li>
                        <li><a href="explore-list-column-two.html">Explore List Col-Two<i class="feather-fast-forward"></i></a></li>
                        <li><a href="explore-left-filter.html">Explore Left Filter<i class="feather-fast-forward"></i></a></li>
                        <li><a class="live-expo" href="explore-live.html">Live Explore</a></li>
                        <li><a class="live-expo" href="explore-live-two.html">Live Explore Carousel</a></li>
                        <li><a class="live-expo" href="explore-live-three.html">Live With Place Bid</a></li>
                    </ul>
                </li>
                <li class="with-megamenu">
                    <a class="nav-link its_new" href="#">Pages</a>
                    <div class="rn-megamenu">
                        <div class="wrapper">
                            <div class="row row--0">
                                <div class="col-lg-3 single-mega-item">
                                    <ul class="mega-menu-item">
                                        <li>
                                            <a href="create.html">Create NFT<i data-feather="file-plus"></i></a>
                                        </li>
                                        <li>
                                            <a href="upload-variants.html">Upload Type<i data-feather="layers"></i></a>
                                        </li>
                                        <li><a href="activity.html">Activity<i data-feather="activity"></i></a></li>
                                        <li>
                                            <a href="creator.html">Creators<i data-feather="users"></i></a>
                                        </li>
                                        <li><a href="collection.html">Our Collection<i data-feather="package"></i></a></li>
                                        <li><a href="upcoming_projects.html">Upcoming Projects<i data-feather="loader"></i></a></li>
                                        <li><a href="create-collection.html">Create Collection<i data-feather="edit-3"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 single-mega-item">
                                    <ul class="mega-menu-item">
                                        <li><a href="login.html">Log In <i data-feather="log-in"></i></a></li>
                                        <li><a href="sign-up.html">Registration <i data-feather="user-plus"></i></a></li>
                                        <li><a href="forget.html">Forget Password <i data-feather="key"></i></a></li>
                                        <li>
                                            <a href="author.html">Author/Profile(User) <i data-feather="user"></i></a>
                                        </li>
                                        <li>
                                            <a href="connect.html">Connect to Wallet <i data-feather="pocket"></i></a>
                                        </li>
                                        <li><a href="privacy-policy.html">Privacy Policy <i data-feather="file-text"></i></a></li>
                                        <li><a href="newsletter.html">Newsletter<i data-feather="book-open"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 single-mega-item">
                                    <ul class="mega-menu-item">

                                        <li><a href="product.html">Product<i data-feather="folder"></i></a></li>
                                        <li><a href="product-details.html">Product Details <i data-feather="layout"></i></a></li>
                                        <li><a href="ranking.html">NFT Ranking<i data-feather="trending-up"></i></a></li>
                                        <li><a href="blog.html">Our News <i data-feather="message-square"></i></a></li>
                                        <li><a href="blog-details.html">Blog Details<i data-feather="book-open"></i></a></li>
                                        <li><a href="404.html">404 <i data-feather="alert-triangle"></i></a></li>
                                        <li><a href="forum-community.html">Forum & Community<i data-feather="message-circle"></i></a></li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 single-mega-item">
                                    <ul class="mega-menu-item">
                                        <li><a href="{{url('/about')}}">About Us<i data-feather="award"></i></a></li>
                                        <li><a href="{{url('/contact')}}">Contact <i data-feather="headphones"></i></a></li>
                                        <li><a href="support.html">Support/FAQ <i data-feather="help-circle"></i></a></li>
                                        <li><a href="terms-condition.html">Terms & Condition <i data-feather="list"></i></a></li>
                                        <li><a href="coming-soon.html">Coming Soon <i data-feather="clock"></i></a></li>
                                        <li><a href="maintenance.html">Maintenance <i data-feather="cpu"></i></a></li>
                                        <li><a href="forum-details.html">Forum Details <i data-feather="message-circle"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class=>
                    <a class="nav-link its_new" href="{{url('/blog')}}">Blog</a>
                </li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
            <!-- End Mainmanu Nav -->
        </nav>
    </div>
</div>
<!-- ENd Header Area -->

<!-- start banner area -->
<div class="slide slide-style-14 slider-video-bg d-flex align-items-center justify-content-center" data-black-overlay="5">

    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="banner-xii-wrapper">
                    <div class="banner-content-wrapper">
                        <p class="pre-title">Inseaa</p>
                        <h1 class="title">#1 place to Acces Indonesian Suppliers Network</h1>
                        <p class="post-title">We are Young Proffesionals to help you procure your valuable demands</p>
                        <a class="btn btn-primary-alta btn-large" href="#">Explore</a>
                        <div class="wallet-image-wrapper">
                            <a href="#" class="avatar" data-tooltip="PPI"><img src="assets/images/ppi.png" alt="wallet_image"></a>
                            <a href="#" class="avatar" data-tooltip="Atdag Canberra"><img src="assets/images/atdag.png" alt="wallet_image"></a>
                            <a href="#" class="avatar" data-tooltip="Import United"><img src="assets/images/import.png" alt="wallet_image"></a>
                            <a href="#" class="avatar" data-tooltip="Bea Cukai"><img src="assets/images/bea cukai.png" alt="wallet_image"></a>
                            <a href="#" class="avatar" data-tooltip="Inbis"><img src="assets/images/inbis.png" alt="wallet_image"></a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="video-background">
        <span>
            <video autoplay="true" loop="true" controls muted style="width: 100%;">
                <source src="assets/images/bannervideo(1).mp4">
            </video>
        </span>
    </div>

</div>
<!-- End banner area -->
<!-- End banner area -->
<!-- start banner area -->
<div class="banner-area banner_xii with-down-shadow">
    <div class="container">
        <div class="row g-5 d-flex align-items-center flex-wrap">
            <!-- banner left -->
            <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12">
                <div class="left-thumbnail-image tilt">
                    <img src="{{asset('assets/images/inseaarakornis.png')}}" alt="">
                </div>
            </div>
            <!-- banner left end -->

            <!-- banner right -->
            <div class="col-xxl-5 col-xl-6 col-lg-12 col-md-12">
                <h1 class="title mb--30">An Association Empowered by The Ministry of Trade of Indonesia</h1>
                <div class="place-bet-area into-banner mt_md--30 mt_sm--30">
                    <div class="rn-bet-create">
                        <!-- About section -->
                        <div class="about-section">
                            <h6 class="title">About</h6>
                            <p class="about-description">
                                INSEAA (Indonesian Student Exporters Association in Australia) is an independent export association directly guided by the Ministry of Trade of Indonesia. We were inaugurated by the Indonesian Trade Attaché for Australia, Mr. Agung Haris Setiawan, on January 25th at the Export Talkshow 2024 event held at 568 Collins St, Melbourne. Our vision is to enhance Indonesian exports to Australia and become an excellent network helping our customers access the best Indonesian products.
                            </p>
                        </div>
                        <!-- End About section -->
                    </div>
                </div>
            </div>
            <!-- banner right end -->
        </div>
    </div>
</div>
<!-- End banner area -->


<!-- start service area -->
<div class="rn-service-area rn-section-gapTop">
    <div class="container">
        <div class="row">
            <div class="col-12 mb--50">
                <h3 class="title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800"> We Are Partnering With and Supported by</h3>
            </div>
        </div>
        <div class="row g-5">
            <!-- start single service -->
            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="rn-service-one color-shape-7">
                    <div class="inner">
                        <div class="icon">
                            <img src="{{asset('assets/images/ppi.png')}}" alt="Shape">
                        </div>
                        <div class="subtitle">01</div>
                        <div class="content">
                            <h4 class="title"><a href="#">PPI Dunia</a></h4>
                            <p class="description">Perhimpunan Pelajar Indonesia (PPI) Dunia adalah organisasi yang menaungi pelajar Indonesia yang sedang menempuh pendidikan di luar negeri</p>
                        </div>
                    </div>
                    <a class="over-link" href="#"></a>
                </div>
            </div>
            <!-- End single service -->
            <!-- start single service -->
            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div data-sal="slide-up" data-sal-delay="200" data-sal-duration="800" class="rn-service-one color-shape-1">
                    <div class="inner">
                        <div class="icon">
                            <img src="{{asset('assets/images/atdag.png')}}" alt="Shape">
                        </div>
                        <div class="subtitle">02</div>
                        <div class="content">
                            <h4 class="title"><a href="#">Atdag Canberra</a></h4>
                            <p class="description">Atase Perdagangan (Atdag) Canberra adalah pejabat dari Kementerian Perdagangan yang bertugas mempromosikan perdagangan antara Indonesia dan Australia.</p>
                        </div>
                    </div>
                    <a class="over-link" href="#"></a>
                </div>
            </div>
            <!-- End single service -->
            <!-- start single service -->
            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div data-sal="slide-up" data-sal-delay="250" data-sal-duration="800" class="rn-service-one color-shape-5">
                    <div class="inner">
                        <div class="icon">
                            <img src="{{asset('assets/images/import.png')}}" alt="Shape">
                        </div>
                        <div class="subtitle">03</div>
                        <div class="content">
                            <h4 class="title"><a href="#">Import United</a></h4>
                            <p class="description">Import United Ausindo Pty Ltd adalah layanan masuk pasar global yang dinamis dan berpikiran maju yang mengkhususkan diri dalam menjembatani kesenjangan perdagangan antara Indonesia dan Australia. </p>
                        </div>
                    </div>
                    <a class="over-link" href="#"></a>
                </div>
            </div>
            <!-- End single service -->
            <!-- start single service -->
            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div data-sal="slide-up" data-sal-delay="300" data-sal-duration="800" class="rn-service-one color-shape-6">
                    <div class="inner">
                        <div class="icon">
                            <img src="{{asset('assets/images/bea cukai.png')}}" alt="Shape">
                        </div>
                        <div class="subtitle">04</div>
                        <div class="content">
                            <h4 class="title"><a href="#">Bea Cukai</a></h4>
                            <p class="description">Direktorat Jenderal Bea dan Cukai atau Bea Cukai adalah salah satu unit eselon I di bawah Kementerian Keuangan yang bertugas untuk mengawasi lalu lintas barang dari dan/atau ke luar negeri, serta mengawasi barang-barang yang memiliki sifat atau karakteristik tertentu.</p>
                        </div>
                    </div>
                    <a class="over-link" href="#"></a>
                </div>
            </div>
            <!-- End single service -->
            <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                <div data-sal="slide-up" data-sal-delay="300" data-sal-duration="800" class="rn-service-one color-shape-6">
                    <div class="inner">
                        <div class="icon">
                            <img src="{{asset('assets/images/inbis.png')}}" alt="Shape">
                        </div>
                        <div class="subtitle">05</div>
                        <div class="content">
                            <h4 class="title"><a href="#">Inbis</a></h4>
                            <p class="description">Direktorat Pengembangan Inovasi Bisnis merupakan wadah bagi para pelajar pengusaha indonesia di luar negeri untuk meningkatkan kompetensi bisnis dan memperluas relasi</p>
                        </div>
                    </div>
                    <a class="over-link" href="#"></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End service area -->
 <!-- start service area -->
 <div class="image-area rn-section-gapTop">
    <div class="container">
        <div class="row mb--40">
            <div class="title-area text-center">
                <h3 class="title mb--15">How to order at inseaa</h3>
                <p class="subtitle">Following are the procedures for ordering at Inseaa. For those of you who want to buy products at Inseaa but don't understand the process, you can check below</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-7">
                <!-- Start image wrapper with border and padding -->
                <div class="border p-3 bg-light">
                    <img src="{{asset('assets/images/fc3.png')}}" alt="Nuron" class="img-fluid">
                </div>
                <!-- End image wrapper -->
            </div>
        </div>
    </div>
</div>

<!-- collection area Start -->
<div class="rn-collection-area rn-section-gapTop">
    <div class="container">
        <div class="row mb--50 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Top Collection</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <a class="btn-transparent" href="#">VIEW ALL<i data-feather="arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row g-5">
            @foreach ($categories as $category)
            <!-- start single collention -->
            <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12">
                <a href="product-details.html" class="rn-collection-inner-one">
                    <div class="collection-wrapper">
                        <div class="collection-big-thumbnail">
                            <img src="{{ asset('category_images/' . $category->image ) }}" alt="Nft_Profile">
                        </div>
                        <div class="collection-deg">
                            <h6 class="title">{{ $category->name }}</h6>
                            <span class="items">{{ $category->products->count() }} Items</span>
                        </div>
                    </div>
                </a>
            </div>
            <!-- End single collention -->
            @endforeach

        </div>
    </div>
</div>
<!-- New items Start -->
<div class="rn-new-items rn-section-gapTop">
    <div class="container">
        <div class="row mb--50 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Popular Items</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <a class="btn-transparent" href="#">VIEW ALL<i data-feather="arrow-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row g-5">
            @foreach ($products->take(5) as $product)
            <!-- start single product -->
            <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="product-style-one no-overlay">
                    <div class="card-thumbnail">
                        <a href="{{ route('products.show', $product) }}"><img src="{{ asset('images/' . $product->images) }}" alt="{{ $product->alt_text }}"></a>
                    </div>
                    <div class="product-share-wrapper">

                        <div class="share-btn share-btn-activation dropdown">
                            <button class="icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg viewBox="0 0 14 4" fill="none" width="16" height="16" class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z" fill="currentColor"></path>
                                </svg>
                            </button>

                            <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal">
                                    Share
                                </button>
                                <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal">
                                    Copy Link Product
                                </button>
                            </div>

                        </div>
                    </div>
                    <a href="{{ route('products.show', $product) }}"><span class="product-name">{{ $product->name }}</span></a>
                    <span class="latest-bid">{{ $product->category->name }}</span>
                    <div class="bid-react-area">

                    </div>
                </div>
            </div>
            <!-- end single product -->
            @endforeach
        </div>
    </div>
</div>
<!-- New items End -->

<!-- Start product area -->
<div class="rn-product-area rn-section-gapTop">
    <div class="container">
        <div class="row mb--50 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Explore Product</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <button class="discover-filter-button discover-filter-activation btn btn-primary">Filter<i class="feather-filter"></i></button>
                </div>
            </div>
        </div>

        <div class="default-exp-wrapper default-exp-expand">
            <div class="inner">
                <div class="filter-select-option">
                    <label class="filter-leble">Category</label>
                    <select onchange="alert('Sedang tahap Development')">
                        <option data-display="Category">Category</option>
                        @foreach ($categories->take(5) as $category)
                        <option value="1">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row g-5">

            @foreach ($products->take(10) as $product)
            <!-- start single product -->
            <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800" class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                <div class="product-style-one no-overlay">
                    <div class="card-thumbnail">
                        <a href="{{ route('products.show', $product) }}"><img src="{{ asset('images/' . $product->images) }}" alt="{{ $product->alt_text }}"></a>
                    </div>
                    <div class="product-share-wrapper">

                        <div class="share-btn share-btn-activation dropdown">
                            <button class="icon" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg viewBox="0 0 14 4" fill="none" width="16" height="16" class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z" fill="currentColor"></path>
                                </svg>
                            </button>

                            <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal">
                                    Share
                                </button>
                                <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal">
                                    Copy Link Product
                                </button>
                            </div>

                        </div>
                    </div>
                    <a href="{{ route('products.show', $product) }}"><span class="product-name">{{ $product->name }}</span></a>
                    <span class="latest-bid">{{ $product->category->name }}</span>
                    <div class="bid-react-area">

                    </div>
                </div>
            </div>
            <!-- end single product -->
            @endforeach
        </div>
    </div>
</div>
<!-- end product area -->

<!-- collection area End -->
<!-- Modal -->
<div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content share-wrapper">
            <div class="modal-header share-area">
                <h5 class="modal-title">Share this NFT</h5>
            </div>
            <div class="modal-body">
                <ul class="social-share-default">
                    <li><a href="#"><span class="icon"><i data-feather="facebook"></i></span><span class="text">facebook</span></a></li>
                    <li><a href="#"><span class="icon"><i data-feather="twitter"></i></span><span class="text">twitter</span></a></li>
                    <li><a href="#"><span class="icon"><i data-feather="linkedin"></i></span><span class="text">linkedin</span></a></li>
                    <li><a href="#"><span class="icon"><i data-feather="instagram"></i></span><span class="text">instagram</span></a></li>
                    <li><a href="#"><span class="icon"><i data-feather="youtube"></i></span><span class="text">youtube</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="rn-popup-modal report-modal-wrapper modal fade" id="reportModal" tabindex="-1" aria-hidden="true">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content report-content-wrapper">
            <div class="modal-header report-modal-header">
                <h5 class="modal-title">Why are you reporting?
                </h5>
            </div>
            <div class="modal-body">
                <p>Describe why you think this item should be removed from marketplace</p>
                <div class="report-form-box">
                    <h6 class="title">Message</h6>
                    <textarea name="message" placeholder="Write issues"></textarea>
                    <div class="report-button">
                        <button type="button" class="btn btn-primary mr--10 w-auto">Report</button>
                        <button type="button" class="btn btn-primary-alta w-auto" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rn-collection-area rn-section-gapTop">
    <div class="container">
        <div class="row mb--50 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Gallery Inseaa</h3>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                    <a class="btn-transparent" href="#">VIEW ALL<i data-feather="arrow-right"></i></a>
                </div>
            </div>
        </div>

        <div class="row g-5">

        </div> <div class="banner-area pt--25">
            <div class="container-fluid">
                <div class="row">
                    <div class="slider-style-2 slick-activation-01 slick-arrow-style-one slick-arrow-between">

                        @foreach ($testimonials as $testimonial)
                        <!-- Start Single Portfolio  -->
                        <div class="single-slide">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="{{ $testimonial->link_post }}"><img src="{{ asset('testimonial_images/' . $testimonial->image) }}" alt="{{ $testimonial->name }}"></a>
                                </div>
                                <div class="banner-read-thumb">
                                    <h4><a href="product-details.html">{{ $testimonial->name }}</a></h4>
                                </div>
                            </div>
                        </div>
                        <!-- Start Single Portfolio  -->
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        </div>
    </div>

<!-- End banner area -->
<!-- Start Footer Area -->
        <!-- Testimonial End -->

    @endsection
