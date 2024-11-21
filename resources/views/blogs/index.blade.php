@extends('layouts.base')

@section('title', 'Blog')

@section('blog')
    <!-- Carousel Start -->
    <div class="popup-mobile-menu">
        <div class="inner">
            <div class="header-top">
                <div class="logo logo-custom-css">
                    <a class="logo-light" href="index.html"><img src="assets/images/logoINSEAA.png" alt="nft-logo"></a>
                    <a class="logo-dark" href="index.html"><img src="assets/images/logoINSEAA.png" alt="nft-logo"></a>
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
    <!-- start page title area -->
    <div class="rn-breadcrumb-inner ptb--30">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <h5 class="title text-center text-md-start">Our Blog</h5>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-list">
                        <li class="item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="separator"><i class="feather-chevron-right"></i></li>
                    <li class="item"><a href="{{ url('/blog') }}">Our Blog</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title area -->

    <div class="rn-blog-area rn-section-gapTop">
        <div class="container">
            <div class="row g-5">
                @foreach ($blogs as $blog)
                <!-- start single blog -->
                <div class="col-xl-3 col-lg-4 col-md-6 col-12" data-sal="slide-up" data-sal-delay="150" data-sal-duration="800">
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
                                        <span><i class="feather-clock"></i>{{ $blog->created_at->format('d F Y') }}</span>
                                    </div>
                                </div>
                                <h4 class="title"><a href="{{ route('blogs.show', $blog) }}">{{ $blog->title }} <i class="feather-arrow-up-right"></i></a></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end single blog -->
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12" data-sal="slide-up" data-sal-delay="550" data-sal-duration="800">
                    <nav class="pagination-wrapper" aria-label="Page navigation example">
                        {{ $blogs->links('vendor.pagination.default') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Section -->
    <div class="banner-area pt--25">
        <div class="container-fluid">
            <div class="row">
                <div class="slider-style-2 slick-activation-01 slick-arrow-style-one slick-arrow-between">
                </div>
            </div>
        </div>
    </div>
@endsection
