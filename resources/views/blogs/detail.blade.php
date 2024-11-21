@extends('layouts.base')

@section('title','Blog_detail')

@section('blogdetail')

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
                <h5 class="title text-center text-md-start">{{ $blog->short_description }}</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-list">
                    <li class="item"><a href="{{ url('/') }}">Home</a></li>
                    <li class="separator"><i class="feather-chevron-right"></i></li>
                    <li class="item"><a href="{{ url('/blog') }}">Blog</a></li>
                    <li class="separator"><i class="feather-chevron-right"></i></li>
                    <li class="item current">{{ $blog->short_description }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end page title area -->

<!-- blog details area start -->
<div class="rn-blog-area rn-blog-details-default rn-section-gapTop">
    <div class="container">
        <div class="row g-6">
            <div class="col-xl-8 col-lg-8">
                <div class="rn-blog-listen">
                    <div class="blog-content-top">
                        <h2 class="title">{{ $blog->title }}</h2>
                        <span class="date">{{ $blog->created_at->format('d F Y') }}</span>
                    </div>
                    <div class="bd-thumbnail">
                        <div class="large-img mb--30">
                            <img class="w-100" src="{{ asset('blog_images/' . $blog->image) }}" alt="{{ $blog->slug }}">
                        </div>
                    </div>
                    <div class="news-details">
                        <p>{!! $blog->content !!}</p>
                    </div>
                    {{-- <div class="comments-wrapper pt--40">
                        <div class="comments-area">
                            <div class="trydo-blog-comment">
                                <h5 class="comment-title mb--40">9 replies on “Have You Heard?
                                    Agency Is Your Best
                                    Bet To Grow”</h5>
                                <!-- Start Coment List  -->
                                <ul class="comment-list">

                                    <!-- Start Single Comment  -->
                                    <li class="comment parent">
                                        <div class="single-comment">
                                            <div class="comment-author comment-img">
                                                <img class="comment-avatar" src="assets/images/blog/comment/comment-01.png" alt="Comment Image">
                                                <div class="m-b-20">
                                                    <div class="commenter">Parent</div>
                                                    <div class="time-spent"> August 20, at 8:44
                                                        pm</div>
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                <p>A component that allows for easy creation of menu
                                                    items, quickly
                                                    creating paragraphs of “Lorem Ipsum” and
                                                    pictures with custom
                                                    sizes.</p>
                                            </div>
                                            <div class="reply-edit">
                                                <div class="reply">
                                                    <a class="comment-reply-link" href="#">
                                                        <i class="rbt feather-corner-down-right"></i>
                                                        Reply
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li class="comment byuser ">
                                                <div class="single-comment">
                                                    <div class="comment-author comment-img">
                                                        <img class="comment-avatar" src="assets/images/blog/comment/comment-01.png" alt="Comment Image">
                                                        <div class="m-b-20">
                                                            <div class="commenter">Admin Comment
                                                            </div>
                                                            <div class="time-spent"> August 20,
                                                                at 8:44 pm
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p>A component that allows for easy creation
                                                            of menu items,
                                                            quickly creating paragraphs of “Lorem
                                                            Ipsum” and
                                                            pictures with custom sizes.</p>
                                                    </div>
                                                    <div class="reply-edit">
                                                        <div class="reply">
                                                            <a class="comment-reply-link" href="#">
                                                                <i class="rbt feather-corner-down-right"></i>
                                                                Reply
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- End Single Comment  -->

                                    <!-- Start Single Comment  -->
                                    <li class="comment parent">
                                        <div class="single-comment">
                                            <div class="comment-author comment-img">
                                                <img class="comment-avatar" src="assets/images/blog/comment/comment-01.png" alt="Comment Image">
                                                <div class="m-b-20">
                                                    <div class="commenter">Craig E. Judge</div>
                                                    <div class="time-spent"> August 20, at 8:44
                                                        pm</div>
                                                </div>
                                            </div>
                                            <div class="comment-text">
                                                <p>A component that allows for easy creation of menu
                                                    items, quickly
                                                    creating paragraphs of “Lorem Ipsum” and
                                                    pictures with custom
                                                    sizes.</p>
                                            </div>
                                            <div class="reply-edit">
                                                <div class="reply">
                                                    <a class="comment-reply-link" href="#">
                                                        <i class="rbt feather-corner-down-right"></i>
                                                        Reply
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <ul class="children">
                                            <li class="comment">
                                                <div class="single-comment">
                                                    <div class="comment-author comment-img">
                                                        <img class="comment-avatar" src="assets/images/blog/comment/comment-01.png" alt="Comment Image">
                                                        <div class="m-b-20">
                                                            <div class="commenter"><a href="#">Child
                                                                    Comment</a>
                                                            </div>
                                                            <div class="time-spent"> August 20,
                                                                at 8:44 pm
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="comment-text">
                                                        <p>A component that allows for easy creation
                                                            of menu items,
                                                            quickly creating paragraphs of “Lorem
                                                            Ipsum” and
                                                            pictures with custom sizes.</p>
                                                    </div>
                                                    <div class="reply-edit">
                                                        <div class="reply">
                                                            <a class="comment-reply-link" href="#">
                                                                <i class="rbt feather-corner-down-right"></i>
                                                                Reply
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="children">
                                                    <li class="comment">
                                                        <div class="single-comment">
                                                            <div class="comment-author comment-img">
                                                                <img class="comment-avatar" src="assets/images/blog/comment/comment-01.png" alt="Comment Image">
                                                                <div class="m-b-20">
                                                                    <div class="commenter">
                                                                        <a href="#">Child
                                                                            Comment</a>
                                                                    </div>
                                                                    <div class="time-spent"> August
                                                                        20, at 8:44
                                                                        pm</div>
                                                                </div>
                                                            </div>
                                                            <div class="comment-text">
                                                                <p>A component that allows for easy
                                                                    creation of menu
                                                                    items,
                                                                    quickly creating paragraphs of
                                                                    “Lorem Ipsum” and
                                                                    pictures with custom sizes.</p>
                                                            </div>
                                                            <div class="reply-edit">
                                                                <div class="reply">
                                                                    <a class="comment-reply-link" href="#">
                                                                        <i
                                                                            class="rbt feather-corner-down-right"></i>
                                                                        Reply
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <!-- End Single Comment  -->


                                </ul>
                                <!-- End Coment List  -->
                            </div>
                        </div>
                    </div> --}}

                    <!-- comment form area Start -->

                    <!-- Start Contact Form Area  -->
                    {{-- <div class="rn-comment-form pt--60">
                        <div class="inner">
                            <div class="section-title">
                                <span class="subtitle">Have a Comment?</span>
                                <h2 class="title">Leave a Reply</h2>
                            </div>
                            <form class="mt--40" action="#">
                                <div class="row">
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="rnform-group"><input type="text" placeholder="Name"></div>
                                        <div class="rnform-group"><input type="email" placeholder="Email"></div>
                                        <div class="rnform-group"><input type="text" placeholder="Website"></div>
                                    </div>
                                    <div class="col-lg-6 col-md-12 col-12">
                                        <div class="rnform-group"><textarea placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="blog-btn">
                                            <a class="btn btn-primary-alta btn-large w-100" href="#"><span>SEND
                                                    MESSAGE</span></a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div> --}}
                    <!-- End Contact Form Area  -->

                    <!-- comment form area End -->
                    <div class="row g-5 pt--60">
                        <div class="col-lg-12">
                            <h3 class="title">New Post</h3>
                        </div>
                @foreach ($blogs as $blog)
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
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
                        @endforeach
                        <!-- end single blog -->
                    </div>
                </div>
            </div>

           
        </div>
    </div>
</div>
<!-- blog details area end -->

@endsection
