@extends('layouts.base')

@section('title','Blog_detail')

@section('blogdetail')

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
        <nav>
            <!-- Start Mainmanu Nav -->
            <ul class="mainmenu">
                <li class="has-droupdown">
                    <a class="nav-link its_new" href="#">Home</a>
                    <ul class="submenu">
                        <li><a href="index.html">Home page - 01 <i class="feather-home"></i></a></li>
                        <li><a href="index-two.html">Home page - 02<i class="feather-home"></i></a></li>
                        <li><a href="index-three.html">Home page - 03<i class="feather-home"></i></a></li>
                        <li><a href="index-four.html">Home page - 04<i class="feather-home"></i></a></li>
                        <li><a href="index-five.html">Home page - 05<i class="feather-home"></i></a></li>
                        <li><a href="index-six.html">Home page - 06<i class="feather-home"></i></a></li>
                        <li><a href="index-seven.html">Home page - 07<i class="feather-home"></i></a></li>
                        <li><a href="index-eight.html">Home page - 08<i class="feather-home"></i></a></li>
                        <li><a href="index-nine.html">Home page - 09<i class="feather-home"></i></a></li>
                        <li><a href="index-ten.html">Home page - 10<i class="feather-home"></i></a></li>
                        <li><a href="index-eleven.html">Home page - 11<i class="feather-home"></i></a></li>
                        <li><a href="index-twelve.html">Home page - 12<i class="feather-home"></i></a></li>
                        <li><a href="index-thirteen.html">Home page - 13<i class="feather-home"></i></a></li>
                        <li><a href="index-fourteen.html">Home page - 14<i class="feather-home"></i></a></li>
                        <li><a href="index-fifteen.html">Home page - 15<i class="feather-home"></i></a></li>
                        <li><a href="index-sixteen.html">Home page - 16<i class="feather-home"></i></a></li>
                        <li><a href="index-seventeen.html">Home page - 17<i class="feather-home"></i></a></li>
                        <li><a href="index-eighteen.html">Home page - 18<i class="feather-home"></i></a></li>
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
                                        <li><a href="about.html">About Us<i data-feather="award"></i></a></li>
                                        <li><a href="contact.html">Contact <i data-feather="headphones"></i></a></li>
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
                <li class="has-droupdown has-menu-child-item">
                    <a class="nav-link its_new" href="blog.html">Blog</a>
                    <ul class="submenu">
                        <li><a href="blog-single-col.html">Blog Single Column<i class="feather-fast-forward"></i></a></li>
                        <li><a href="blog-col-two.html">Blog Two Column<i class="feather-fast-forward"></i></a></li>
                        <li><a href="blog-col-three.html">Blog Three Column<i class="feather-fast-forward"></i></a></li>
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
<!-- start page title area -->
<div class="rn-breadcrumb-inner ptb--30">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-6 col-12">
                <h5 class="title text-center text-md-start">Blog Details</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-list">
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="separator"><i class="feather-chevron-right"></i></li>
                    <li class="item current">Blog Details</li>
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
                        <h2 class="title">Digital Marketo to Their New Office.</h2>
                        <span class="date">2 Aug, 2022</span>
                    </div>
                    <div class="bd-thumbnail">
                        <div class="large-img mb--30">
                            <img class="w-100" src="assets/images/blog/lg/blog-01.jpg" alt="Blog Images">
                        </div>
                    </div>
                    <div class="news-details">

                        <p>Nobis eleifend option congue nihil imperdiet doming id quod mazim placerat
                            facer
                            possim assum.
                            Typi non
                            habent claritatem insitam; est usus legentis in iis qui facit eorum
                            claritatem.
                            Investigationes
                            demonstraverunt
                            lectores legere me lius quod ii legunt saepius. Claritas est etiam processus
                            dynamicus, qui
                            sequitur
                            mutationem consuetudium lectorum.</p>
                        <h4>Nobis eleifend option conguenes.</h4>
                        <p>Mauris tempor, orci id pellentesque convallis, massa mi congue eros, sed
                            posuere
                            massa nunc quis
                            dui.
                            Integer ornare varius mi, in vehicula orci scelerisque sed. Fusce a massa
                            nisi.
                            Curabitur sit
                            amet
                            suscipit nisl. Sed eget nisl laoreet, suscipit enim nec, viverra eros. Nunc
                            imperdiet risus
                            leo,
                            in rutrum erat dignissim id.</p>
                        <p>Ut rhoncus vestibulum facilisis. Duis et lorem vitae ligula cursus venenatis.
                            Class aptent
                            taciti sociosqu
                            ad litora torquent per conubia nostra, per inceptos himenaeos. Nunc vitae
                            nisi
                            tortor. Morbi
                            leo
                            nulla, posuere vel lectus a, egestas posuere lacus. Fusce eleifend hendrerit
                            bibendum. Morbi
                            nec
                            efficitur ex.</p>
                        <h4>Mauris tempor, orci id pellentesque.</h4>
                        <p>Nulla non ligula vel nisi blandit egestas vel eget leo. Praesent fringilla
                            dapibus dignissim.
                            Pellentesque
                            quis quam enim. Vestibulum ultrices, leo id suscipit efficitur, odio lorem
                            rhoncus dolor, a
                            facilisis
                            neque mi ut ex. Quisque tempor urna a nisi pretium, a pretium massa
                            tristique.
                            Nullam in
                            aliquam
                            diam. Maecenas at nibh gravida, ornare eros non, commodo ligula. Sed
                            efficitur
                            sollicitudin
                            auctor.
                            Quisque nec imperdiet purus, in ornare odio. Quisque odio felis, vestibulum
                            et.</p>
                    </div>
                    <div class="comments-wrapper pt--40">
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
                    </div>

                    <!-- comment form area Start -->

                    <!-- Start Contact Form Area  -->
                    <div class="rn-comment-form pt--60">
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
                    </div>
                    <!-- End Contact Form Area  -->

                    <!-- comment form area End -->
                    <div class="row g-5 pt--60">
                        <div class="col-lg-12">
                            <h3 class="title">Related Post</h3>
                        </div>
                        <!-- start single blog -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                            <div class="rn-blog" data-toggle="modal" data-target="#exampleModalCenters">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/blog-02.jpg" alt="Personal Portfolio Images">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="category-info">
                                            <div class="category-list">
                                                <a href="blog-details.html">Development</a>
                                            </div>
                                            <div class="meta">
                                                <span><i class="feather-clock"></i> 2 hour read</span>
                                            </div>
                                        </div>
                                        <h4 class="title"><a href="blog-details.html">The services provide for
                                                design <i class="feather-arrow-up-right"></i></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end single blog -->
                        <!-- start single blog -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                            <div class="rn-blog" data-toggle="modal" data-target="#exampleModalCenters">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/blog-03.jpg" alt="Personal Portfolio Images">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="category-info">
                                            <div class="category-list">
                                                <a href="blog-details.html">Design</a>
                                            </div>
                                            <div class="meta">
                                                <span><i class="feather-clock"></i> 5 min read</span>
                                            </div>
                                        </div>
                                        <h4 class="title"><a href="blog-details.html">More important feature for
                                                designer<i class="feather-arrow-up-right"></i></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end single blog -->
                        <!-- start single blog -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-12">
                            <div class="rn-blog" data-toggle="modal" data-target="#exampleModalCenters">
                                <div class="inner">
                                    <div class="thumbnail">
                                        <a href="blog-details.html">
                                            <img src="assets/images/blog/blog-04.jpg" alt="Personal Portfolio Images">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="category-info">
                                            <div class="category-list">
                                                <a href="blog-details.html">Marketing</a>
                                            </div>
                                            <div class="meta">
                                                <span><i class="feather-clock"></i> 10 min read</span>
                                            </div>
                                        </div>
                                        <h4 class="title"><a href="blog-details.html">Inavalide purpose classes &
                                                motivation.<i class="feather-arrow-up-right"></i></a></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end single blog -->
                    </div>
                </div>
            </div>

            <div class="col-xl-4 col-lg-4 mt_md--40 mt_sm--40">
                <aside class="rwt-sidebar">


                    <div class="rbt-single-widget widget_recent_entries mt--40">
                        <h3 class="title">Recent Posts</h3>
                        <div class="inner">
                            <ul>
                                <li><a class="d-block" href="#">Best Corporate Tips You Will
                                        Read This Year.</a><span class="cate">Development</span></li>
                                <li><a class="d-block" href="#">Should Fixing Corporate Take
                                        100 Steps.</a><span class="cate">UX Design</span></li>
                                <li><a class="d-block" href="#">The Next 100 Things To
                                        Immediately Do About.</a><span class="cate">Development</span></li>
                                <li><a class="d-block" href="#">Top 5 Lessons About
                                        Corporate
                                        To Learn Before.</a><span class="cate">Marketing</span></li>
                            </ul>
                        </div>
                    </div>


                    <div class="rbt-single-widget widget_tag_cloud mt--40">
                        <h3 class="title">Tags</h3>
                        <div class="inner mt--20">
                            <div class="tagcloud">
                                <a href="#">Digital Art</a>
                                <a href="#">Crypto</a>
                                <a href="#">NFT</a>
                                <a href="#">Digital Image</a>
                                <a href="#">Bit Coin</a>
                                <a href="#">Coin Base</a>
                                <a href="#">Development</a>
                                <a href="#">App Art</a>
                                <a href="#">Startup</a>
                                <a href="#">Images</a>
                                <a href="#">Music</a>
                                <a href="#">Non-Replacable</a>
                                <a href="#">Art</a>
                                <a href="#">Magic</a>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- blog details area end -->

@endsection
