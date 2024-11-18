@extends('layouts.base')

@section('title', 'About')

@section('about')

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
    <!-- About banner area -->
    <div class="rn-about-banner-area rn-section-gapTop">
        <div class="container mb--30">
            <div class="row">
                <div class="col-12">
                    <h2 class="title about-title-m" data-sal="slide-up" data-sal-duration="800" data-sal-delay="150">
                        Direct Teams. <br>For Your Dadicated Dreams</h2>
                </div>
            </div>
        </div>
        <div class="container-fluid about-fluidimg ">
            <div class="row">
                <div class="img-wrapper">
                    <div class="bg_image bg-image-border" style="background-image: url('{{ asset('assets/images/about1.png') }}'); background-size: cover; background-position: center;"">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="h--100">
                        <div class="rn-about-card mt_dec--50 widge-wrapper rbt-sticky-top-adjust">
                            <div class="inner">
                                <h2 class="title" data-sal="slide-up" data-sal-duration="800" data-sal-delay="150">
                                    About Inseaa
                                </h2>
                                <p class="about-disc" data-sal="slide-up" data-sal-duration="800" data-sal-delay="150">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate dolores velit minus
                                    necessitatibus libero minima vitae esse ea consequatur in. Possimus fugiat cum esse
                                    consectetur. Eius eum suscipit autem corporis!
                                </p>
                                <a href="{{ url('blog') }}" class="btn btn-primary-alta btn-large sal-animate mt--20"
                                    data-sal="slide-up" data-sal-duration="800" data-sal-delay="150">See Our Blog</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="rn-about-card transparent-bg">
                        <div class="inner">
                            <h3 class="title" data-sal="slide-up" data-sal-duration="800" data-sal-delay="150">
                                Helping You <br>Grow In Every Stage.
                            </h3>
                            <p class="about-disc mb--0" data-sal="slide-up" data-sal-duration="800"
                                data-sal-delay="150">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse excepturi, iste molestiae est
                                voluptatem repellat facere quo, fugiat quisquam blanditiis officia minus ratione impedit
                                vero! Nisi voluptatum consequatur dicta quasi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About banner area End -->

    <div class="rn-about-Quote-area rn-section-gapTop">
        <div class="container">
            <div class="row g-5 d-flex align-items-center">
                <div class="col-lg-6">
                    <div class="rn-about-title-wrapper">
                        <h3 class="title" data-sal="slide-up" data-sal-duration="800" data-sal-delay="150">Lorem ipsum
                            dolor sit amet consectetur adipisicing elit. Minus, illum eius accusantium qui voluptate dicta
                            excepturi </h3>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="rn-about-wrapper" data-sal="slide-up" data-sal-duration="800" data-sal-delay="150">
                        <p>The INSEAA is a one-trick pony that climbed the ladders of success in recent years. The growth
                            of INSEAA is tremendous, and according to Pymnts.com, the total sales volume of INSEAA has
                            nearly crossed $2.5 billion in the last six months of . Surprisingly, the total sales
                            volume of INSEAA was $13.7 million in 2020. On comparing both the values,</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- call to action area -->
    <div class="rn-callto-action rn-section-gapTop">
        <div class="container-fluid about-fluidimg-cta">
            <div class="row">
                <div class="col-lg-12">
                    <div class="bg_image bg-image-border" style="background-image: url('{{ asset('assets/images/about.png') }}'); background-size: cover; background-position: center;" data-black-overlay="7">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="call-to-action-wrapper">
                                    <h3 data-sal="slide-up" data-sal-duration="800" data-sal-delay="150">Discover
                                        rare digital art <br>
                                        and collect INSEAA</h3>
                                    <p data-sal="slide-up" data-sal-duration="800" data-sal-delay="150">The INSEAA is a
                                        one-trick pony that climbed the recent years. The growth of INSEAA is
                                        tremendous, and according to Pymnts.com, the total sales volume </p>
                                    <div class="callto-action-btn-wrapper" data-sal="slide-up" data-sal-duration="800"
                                        data-sal-delay="150">
                                        <a href="{{ url('contact') }}" class="btn btn-primary-alta btn-large">Contact Us</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- call to action area End -->

    <!-- Start BLog Area  -->
    <div class="rn-blog-area rn-section-gapTop">
        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Our Recent
                        Blog</h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                    <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up"
                        data-sal-duration="800">
                        <a class="btn-transparent" href="{{ url('blog') }}">VIEW ALL<i data-feather="arrow-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row g-5">
                <!-- start single blog -->
                @foreach ($blogs as $blog)
                    <!-- start single blog -->
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12" data-sal="slide-up" data-sal-delay="150"
                        data-sal-duration="800">
                        <div class="rn-blog" data-toggle="modal" data-target="#exampleModalCenters">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="{{ route('blogs.show', $blog) }}">
                                        <img src="{{ asset('blog_images/' . $blog->image) }}" alt="{{ $blog->slug }}">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="{{ route('blogs.show', $blog) }}">{{ $blog->author }}</a>
                                        </div>
                                        <div class="meta">
                                            <span><i
                                                    class="feather-clock"></i>{{ $blog->created_at->format('d F Y') }}</span>
                                        </div>
                                    </div>
                                    <h4 class="title"><a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }} <i
                                                class="feather-arrow-up-right"></i></a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single blog -->
                @endforeach
            </div>
        </div>
    </div>
    <!-- End BLog Area  -->
@endsection
