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
                    <li class="has-droupdown">
                        <a class="nav-link its_new" href="#">Home</a>
                        <ul class="submenu">
                           
                        </ul>
                    </li>
                    <li><a href="{{url('/about')}}">About</a>
                    </li>
                    <li class="has-droupdown">
                        <a class="nav-link its_new" href="#">Explore</a>
                        <ul class="submenu">
                            <li><a href="explore-one.html">Explore Filter<i class="feather-fast-forward"></i></a></li>
                            <li><a href="explore-two.html">Explore Isotop<i class="feather-fast-forward"></i></a></li>
                            <li><a href="explore-three.html">Explore Carousel<i class="feather-fast-forward"></i></a></li>
                            <li><a href="explore-four.html">Explore Simple<i class="feather-fast-forward"></i></a></li>
                            <li><a href="explore-five.html">Explore Place Bid<i class="feather-fast-forward"></i></a></li>
                            <li><a href="explore-six.html">Place Bid With Filter<i class="feather-fast-forward"></i></a>
                            </li>
                            <li><a href="explore-seven.html">Place Bid With Isotop<i class="feather-fast-forward"></i></a>
                            </li>
                            <li><a href="explore-eight.html">Place Bid With Carousel<i class="feather-fast-forward"></i></a>
                            </li>
                            <li><a href="explore-list-style.html">Explore Style List<i class="feather-fast-forward"></i></a>
                            </li>
                            <li><a href="explore-list-column-two.html">Explore List Col-Two<i
                                        class="feather-fast-forward"></i></a></li>
                            <li><a href="explore-left-filter.html">Explore Left Filter<i
                                        class="feather-fast-forward"></i></a></li>
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
                                            <li><a href="collection.html">Our Collection<i data-feather="package"></i></a>
                                            </li>
                                            <li><a href="upcoming_projects.html">Upcoming Projects<i
                                                        data-feather="loader"></i></a></li>
                                            <li><a href="create-collection.html">Create Collection<i
                                                        data-feather="edit-3"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="login.html">Log In <i data-feather="log-in"></i></a></li>
                                            <li><a href="sign-up.html">Registration <i data-feather="user-plus"></i></a>
                                            </li>
                                            <li><a href="forget.html">Forget Password <i data-feather="key"></i></a></li>
                                            <li>
                                                <a href="author.html">Author/Profile(User) <i data-feather="user"></i></a>
                                            </li>
                                            <li>
                                                <a href="connect.html">Connect to Wallet <i data-feather="pocket"></i></a>
                                            </li>
                                            <li><a href="privacy-policy.html">Privacy Policy <i
                                                        data-feather="file-text"></i></a></li>
                                            <li><a href="newsletter.html">Newsletter<i data-feather="book-open"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 single-mega-item">
                                        <ul class="mega-menu-item">

                                            <li><a href="product.html">Product<i data-feather="folder"></i></a></li>
                                            <li><a href="product-details.html">Product Details <i
                                                        data-feather="layout"></i></a></li>
                                            <li><a href="ranking.html">NFT Ranking<i data-feather="trending-up"></i></a>
                                            </li>
                                            <li><a href="blog.html">Our News <i data-feather="message-square"></i></a>
                                            </li>
                                            <li><a href="blog-details.html">Blog Details<i
                                                        data-feather="book-open"></i></a></li>
                                            <li><a href="404.html">404 <i data-feather="alert-triangle"></i></a></li>
                                            <li><a href="forum-community.html">Forum & Community<i
                                                        data-feather="message-circle"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 single-mega-item">
                                        <ul class="mega-menu-item">
                                            <li><a href="about.html">About Us<i data-feather="award"></i></a></li>
                                            <li><a href="contact.html">Contact <i data-feather="headphones"></i></a></li>
                                            <li><a href="support.html">Support/FAQ <i data-feather="help-circle"></i></a>
                                            </li>
                                            <li><a href="terms-condition.html">Terms & Condition <i
                                                        data-feather="list"></i></a></li>
                                            <li><a href="coming-soon.html">Coming Soon <i data-feather="clock"></i></a>
                                            </li>
                                            <li><a href="maintenance.html">Maintenance <i data-feather="cpu"></i></a></li>
                                            <li><a href="forum-details.html">Forum Details <i
                                                        data-feather="message-circle"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="has-droupdown has-menu-child-item">
                        <a class="nav-link its_new" href="blog.html">Blog</a>
                        <ul class="submenu">
                            <li><a href="blog-single-col.html">Blog Single Column<i class="feather-fast-forward"></i></a>
                            </li>
                            <li><a href="blog-col-two.html">Blog Two Column<i class="feather-fast-forward"></i></a></li>
                            <li><a href="blog-col-three.html">Blog Three Column<i class="feather-fast-forward"></i></a>
                            </li>
                            <li><a href="blog.html">Blog Four Column<i class="feather-fast-forward"></i></a></li>
                            <li><a href="blog-details.html">Blog Details<i class="feather-fast-forward"></i></a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
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
                                <a href="blog.html" class="btn btn-primary-alta btn-large sal-animate mt--20"
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
                                        <a href="create.html" class="btn btn-primary btn-large">Create</a>
                                        <a href="contact.html" class="btn btn-primary-alta btn-large">Contact Us</a>
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
                        <a class="btn-transparent" href="#">VIEW ALL<i data-feather="arrow-right"></i></a>
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
