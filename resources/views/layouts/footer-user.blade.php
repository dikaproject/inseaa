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
                        <li class="single-list"><a href="#">Home</a></li>
                        <li class="single-list"><a href="#">About</a></li>
                        <li class="single-list"><a href="#">Product</a></li>
                        <li class="single-list"><a href="#">Contact</a></li>
                        <li class="single-list"><a href="#">Blog</a></li>
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
