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
                    <li class="has-menu-child-item">
                        <a href="{{ url('/') }}">Home</a>
                    </li>
                    <li><a href="{{ url('/about') }}">About</a>
                    </li>
                    <li class="has-menu-child-item">
                        <a href="{{ route('view.products.index') }}">Product</a>
                    </li>
                    <li class="has-menu-child-item">
                    </li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                    <li class="has-menu-child-item">
                        <a href="{{ url('/blog') }}">Blog</a>
                    </li>
                </ul>
                <!-- End Mainmanu Nav -->
            </nav>
        </div>
    </div>
    <!-- ENd Header Area -->

    <!-- start banner area -->
    <div class="slide slide-style-14 slider-video-bg d-flex align-items-center justify-content-center"
        data-black-overlay="5">

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="banner-xii-wrapper">
                        <div class="banner-content-wrapper">
                            <p class="pre-title">Inseaa</p>
                            <h1 class="title">#1 place to Acces Indonesian Suppliers Network</h1>
                            <p class="post-title">We are Young Proffesionals to help you procure your valuable demands</p>
                            <a class="btn btn-primary-alta btn-large" href="{{ url('about') }}">Explore</a>
                            <div class="wallet-image-wrapper">
                                <a href="#" class="avatar" data-tooltip="PPI"><img src="assets/images/ppi.png"
                                        alt="wallet_image"></a>
                                <a href="#" class="avatar" data-tooltip="Atdag Canberra"><img
                                        src="assets/images/atdag.png" alt="wallet_image"></a>
                                <a href="#" class="avatar" data-tooltip="Import United"><img
                                        src="assets/images/import.png" alt="wallet_image"></a>
                                <a href="#" class="avatar" data-tooltip="Bea Cukai"><img
                                        src="assets/images/bea cukai.png" alt="wallet_image"></a>
                                <a href="#" class="avatar" data-tooltip="Inbis"><img src="assets/images/inbis.png"
                                        alt="wallet_image"></a>
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
                        <img src="{{ asset('assets/images/inseaarakornis.png') }}" alt="">
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
                                    INSEAA (Indonesian Student Exporters Association in Australia) is an independent export
                                    association directly guided by the Ministry of Trade of Indonesia. We were inaugurated
                                    by the Indonesian Trade Attaché for Australia, Mr. Agung Haris Setiawan, on January 25th
                                    at the Export Talkshow 2024 event held at 568 Collins St, Melbourne. Our vision is to
                                    enhance Indonesian exports to Australia and become an excellent network helping our
                                    customers access the best Indonesian products.
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
                    <h3 class="title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800"> We Are
                        Partnering With and Supported by</h3>
                </div>
            </div>
            <div class="row g-5">
                <!-- start single service -->
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800"
                        class="rn-service-one color-shape-7">
                        <div class="inner">
                            <div class="icon">
                                <img src="{{ asset('assets/images/ppi.png') }}" alt="Shape">
                            </div>
                            <div class="subtitle">01</div>
                            <div class="content">
                                <h4 class="title"><a href="#">PPI Dunia</a></h4>
                                <p class="description">Perhimpunan Pelajar Indonesia (PPI) Dunia adalah organisasi yang
                                    menaungi pelajar Indonesia yang sedang menempuh pendidikan di luar negeri</p>
                            </div>
                        </div>
                        <a class="over-link" href="#"></a>
                    </div>
                </div>
                <!-- End single service -->
                <!-- start single service -->
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div data-sal="slide-up" data-sal-delay="200" data-sal-duration="800"
                        class="rn-service-one color-shape-1">
                        <div class="inner">
                            <div class="icon">
                                <img src="{{ asset('assets/images/jumboatdag.png') }}" alt="Shape">
                            </div>
                            <div class="subtitle">02</div>
                            <div class="content">
                                <h4 class="title"><a href="#">Atdag Canberra</a></h4>
                                <p class="description">Atase Perdagangan (Atdag) Canberra adalah pejabat dari Kementerian
                                    Perdagangan yang bertugas mempromosikan perdagangan antara Indonesia dan Australia.</p>
                            </div>
                        </div>
                        <a class="over-link" href="#"></a>
                    </div>
                </div>
                <!-- End single service -->
                <!-- start single service -->
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div data-sal="slide-up" data-sal-delay="250" data-sal-duration="800"
                        class="rn-service-one color-shape-5">
                        <div class="inner">
                            <div class="icon">
                                <img src="{{ asset('assets/images/import.png') }}" alt="Shape">
                            </div>
                            <div class="subtitle">03</div>
                            <div class="content">
                                <h4 class="title"><a href="#">Import United</a></h4>
                                <p class="description">Import United Ausindo Pty Ltd adalah layanan masuk pasar global yang
                                    dinamis dan berpikiran maju yang mengkhususkan diri dalam menjembatani kesenjangan
                                    perdagangan antara Indonesia dan Australia. </p>
                            </div>
                        </div>
                        <a class="over-link" href="#"></a>
                    </div>
                </div>
                <!-- End single service -->
                <!-- start single service -->
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div data-sal="slide-up" data-sal-delay="300" data-sal-duration="800"
                        class="rn-service-one color-shape-6">
                        <div class="inner">
                            <div class="icon">
                                <img src="{{ asset('assets/images/bea cukai.png') }}" alt="Shape">
                            </div>
                            <div class="subtitle">04</div>
                            <div class="content">
                                <h4 class="title"><a href="#">Bea Cukai</a></h4>
                                <p class="description">Direktorat Jenderal Bea dan Cukai atau Bea Cukai adalah salah satu
                                    unit eselon I di bawah Kementerian Keuangan yang bertugas untuk mengawasi lalu lintas
                                    barang dari dan/atau ke luar negeri, serta mengawasi barang-barang yang memiliki sifat
                                    atau karakteristik tertentu.</p>
                            </div>
                        </div>
                        <a class="over-link" href="#"></a>
                    </div>
                </div>
                <!-- End single service -->
                <div class="col-xxl-3 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div data-sal="slide-up" data-sal-delay="300" data-sal-duration="800"
                        class="rn-service-one color-shape-6">
                        <div class="inner">
                            <div class="icon">
                                <img src="{{ asset('assets/images/inbis.png') }}" alt="Shape">
                            </div>
                            <div class="subtitle">05</div>
                            <div class="content">
                                <h4 class="title"><a href="#">Inbis</a></h4>
                                <p class="description">Direktorat Pengembangan Inovasi Bisnis merupakan wadah bagi para
                                    pelajar pengusaha indonesia di luar negeri untuk meningkatkan kompetensi bisnis dan
                                    memperluas relasi</p>
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
        <div class="container-fluid">
            <div class="row mb--40">
                <div class="title-area text-center">
                    <h3 class="title mb--15">How to order at inseaa</h3>
                    <p class="subtitle">Following are the procedures for ordering at Inseaa. For those of you who want to
                        buy products at Inseaa but don't understand the process, you can check below</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-12 p-0 text-center">
                    <img src="{{ asset('assets/images/flowchart fix.png') }}" alt="order-flowchart" class="img-fluid" style="max-width: 80%; height: auto;">
                </div>
            </div>
        </div>
    </div>

    <!-- collection area Start -->
        <div class="rn-collection-area rn-section-gapTop">
        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Top
                        Collection</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                    <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up"
                        data-sal-duration="800">
                        <a class="btn-transparent" href="{{ route('view.products.index') }}">VIEW ALL<i
                                data-feather="arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                @foreach ($categories as $category)
                    <!-- start single collection -->
                    <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800"
                        class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-12">
                        <a href="{{ route('view.products.index') }}?category={{ $category->id }}"
                            class="rn-collection-inner-one">
                            <div class="collection-wrapper">
                                <div class="collection-big-thumbnail">
                                    <img src="{{ asset('category_images/' . $category->image) }}"
                                        alt="{{ $category->name }}">
                                </div>
                                <div class="collection-deg">
                                    <h6 class="title">{{ $category->name }}</h6>
                                    <span class="items">{{ $category->products->count() }} Items</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- End single collection -->
                @endforeach


            </div>
        </div>
    </div>
    <!-- New items Start -->
    <div class="rn-new-items rn-section-gapTop">
        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Popular
                        Items</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                    <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up"
                        data-sal-duration="800">
                        <a class="btn-transparent" href="{{ route('view.products.index') }}">VIEW ALL<i
                                data-feather="arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                @foreach ($products->take(5) as $product)
                    <!-- start single product -->
                    <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800"
                        class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-style-one no-overlay h-100 d-flex flex-column">
                            <div class="card-thumbnail" style="position: relative; padding-top: 100%; overflow: hidden;">
                                <a href="{{ route('products.show', $product) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    @if ($product->images->isNotEmpty())
                                        <img src="{{ asset('images/' . $product->images->first()->image_path) }}"
                                            alt="{{ $product->images->first()->alt_text }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/placeholder.png') }}"
                                            alt="No image available"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @endif
                                </a>
                            </div>
                            <div class="product-share-wrapper mt-3">
                                <div class="share-btn share-btn-activation dropdown">
                                    <button class="icon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg viewBox="0 0 14 4" fill="none" width="16" height="16"
                                            class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </button>
                                    <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                        <button type="button" class="btn-setting-text copy-text"
                                            data-product-url="{{ route('products.show', $product) }}">
                                            Copy Link
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="collection-deg">
                                <a href="{{ route('products.show', $product) }}" class="d-block">
                                    <h6 class="title">{{ $product->name }}</h6>
                                </a>
                                <span class="items">{{ $product->category->name }}</span>
                            </div>
                            <div class="bid-react-area mt-auto">
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
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Explore
                        Product</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                    <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up"
                        data-sal-duration="800">
                        <a class="btn-transparent" href="{{ route('view.products.index') }}">VIEW ALL<i
                                data-feather="arrow-right"></i></a>
                    </div>
                </div>
            </div>
        
            <div class="row g-5">
                @foreach ($products->take(10) as $product)
                    <!-- start single product -->
                    <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800"
                        class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-style-one no-overlay h-100 d-flex flex-column">
                            <div class="card-thumbnail" style="position: relative; padding-top: 100%; overflow: hidden;">
                                <a href="{{ route('products.show', $product) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%;">
                                    @if ($product->images->isNotEmpty())
                                        <img src="{{ asset('images/' . $product->images->first()->image_path) }}"
                                            alt="{{ $product->images->first()->alt_text }}"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @else
                                        <img src="{{ asset('images/placeholder.png') }}"
                                            alt="No image available"
                                            style="width: 100%; height: 100%; object-fit: cover;">
                                    @endif
                                </a>
                            </div>
                            <div class="product-share-wrapper mt-3">
                                <div class="share-btn share-btn-activation dropdown">
                                    <button class="icon" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg viewBox="0 0 14 4" fill="none" width="16" height="16"
                                            class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </button>
                                    <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                        <button type="button" class="btn-setting-text copy-text"
                                            data-product-url="{{ route('products.show', $product) }}">
                                            Copy Link
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="collection-deg">
                                <a href="{{ route('products.show', $product) }}" class="d-block">
                                    <h6 class="title">{{ $product->name }}</h6>
                                </a>
                                <span class="items">{{ $product->category->name }}</span>
                            </div>
                            <div class="bid-react-area mt-auto">
                            </div>
                        </div>
                    </div>
                    <!-- end single product -->
                @endforeach
            </div>
        </div>
    </div>
    <!-- end product area -->

    <div class="rn-collection-area rn-section-gapTop">
        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Gallery
                        Inseaa</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                    <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up"
                        data-sal-duration="800">
                        <a class="btn-transparent" href="{{ url('/blog') }}">VIEW ALL<i
                                data-feather="arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <div class="row g-5">

            </div>
            <div class="banner-area pt--25">
                <div class="container-fluid">
                    <div class="row">
                        <div class="slider-style-2 slick-activation-01 slick-arrow-style-one slick-arrow-between">

                            @foreach ($testimonials as $testimonial)
                                <!-- Start Single Portfolio  -->
                                <div class="single-slide">
                                    <div class="inner">
                                        <div class="thumbnail">
                                            <a href="{{ $testimonial->link_post }}"><img
                                                    src="{{ asset('testimonial_images/' . $testimonial->image) }}"
                                                    alt="{{ $testimonial->name }}"></a>
                                        </div>
                                        <div class="banner-read-thumb">
                                            <h4><a href="{{ $testimonial->link_post }}">{{ $testimonial->name }}</a></h4>
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
@section('script-js')
    <script>
        // Copy Link Product functionality
        document.addEventListener('click', function(event) {
            if (event.target.matches('.copy-text')) {
                var button = event.target;
                var productUrl = button.getAttribute('data-product-url');

                // Try to copy the product URL to clipboard
                navigator.clipboard.writeText(productUrl).then(function() {
                    // Show alert after successful copy
                    alert('Product link copied to clipboard!');
                }).catch(function(err) {
                    console.error('Could not copy text: ', err);
                    alert('Failed to copy the product link.');
                });
            }
        });
    </script>
@endsection
