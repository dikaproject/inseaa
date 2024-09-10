@extends('layouts.base')

@section('title', 'Blog')

@section('blog')
    <!-- Carousel Start -->
    <div class="popup-mobile-menu">
        <div class="inner">
            <div class="header-top">
                <div class="logo logo-custom-css">
                    <a class="logo-light" href="index.html"><img src="assets/images/logo/logo-white.png" alt="nft-logo"></a>
                    <a class="logo-dark" href="index.html"><img src="assets/images/logo/logo-dark.png" alt="nft-logo"></a>
                </div>
                <div class="close-menu">
                    <button class="close-button">
                        <i class="feather-x"></i>
                    </button>
                </div>
            </div>
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
                        <li class="item"><a href="index.html">Home</a></li>
                        <li class="separator"><i class="feather-chevron-right"></i></li>
                        <li class="item current">Our Blog</li>
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
                        <ul class="pagination">
                            <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                            <li class="page-item"><a class="page-link active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">Next</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <script>
                document.querySelectorAll('.page-link').forEach(link => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        alert('Fitur dalam tahap pengembangan');
                    });
                });
            </script>
            </div>
        </div>
    </div>
@endsection
