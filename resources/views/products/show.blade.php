@extends('layouts.base')

@section('title', $product->name)

@section('product-details')
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
                <h5 class="title text-center text-md-start">Product Details</h5>
            </div>
            <div class="col-lg-6 col-md-6 col-12">
                <ul class="breadcrumb-list">
                    <li class="item"><a href="index.html">Home</a></li>
                    <li class="separator"><i class="feather-chevron-right"></i></li>
                    <li class="item current">Product Details</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- end page title area -->

<!-- start product details area -->
<div class="product-details-area rn-section-gapTop">
    <div class="container">
        <div class="row g-5">
            <!-- product image area -->
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="product-tab-wrapper rbt-sticky-top-adjust">
                    <div class="pd-tab-inner">
                        <div class="nav rn-pd-nav rn-pd-rt-content nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">
                                <span class="rn-pd-sm-thumbnail">
                                    <img src="{{ asset('images/'. $product->images) }}" alt="Nft_Profile">
                                </span>
                            </button>
                            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                                <span class="rn-pd-sm-thumbnail">
                                    <img src="assets/images/portfolio/sm/portfolio-02.jpg" alt="Nft_Profile">
                                </span>
                            </button>
                            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                                <span class="rn-pd-sm-thumbnail">
                                    <img src="assets/images/portfolio/sm/portfolio-03.jpg" alt="Nft_Profile">
                                </span>
                            </button>
                        </div>

                        <div class="tab-content rn-pd-content" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="rn-pd-thumbnail">
                                    <img src="{{ asset('images/'. $product->images) }}" alt="Nft_Profile">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                                <div class="rn-pd-thumbnail">
                                    <img src="assets/images/portfolio/lg/portfolio-02.jpg" alt="Nft_Profile">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                                <div class="rn-pd-thumbnail">
                                    <img src="assets/images/portfolio/lg/portfolio-03.jpg" alt="Nft_Profile">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- product image area end -->

            <div class="col-lg-5 col-md-12 col-sm-12 mt_md--50 mt_sm--60">
                <div class="rn-pd-content-area">
                    <div class="pd-title-area">
                        <h4 class="title">{{ $product->name }}</h4>
                        <div class="pd-react-area">
                            <div class="count">
                                <div class="share-btn share-btn-activation dropdown">
                                    <button class="icon" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <svg viewBox="0 0 14 4" fill="none" width="16" height="16" class="sc-bdnxRM sc-hKFxyN hOiKLt">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 2C3.5 2.82843 2.82843 3.5 2 3.5C1.17157 3.5 0.5 2.82843 0.5 2C0.5 1.17157 1.17157 0.5 2 0.5C2.82843 0.5 3.5 1.17157 3.5 2ZM8.5 2C8.5 2.82843 7.82843 3.5 7 3.5C6.17157 3.5 5.5 2.82843 5.5 2C5.5 1.17157 6.17157 0.5 7 0.5C7.82843 0.5 8.5 1.17157 8.5 2ZM11.999 3.5C12.8274 3.5 13.499 2.82843 13.499 2C13.499 1.17157 12.8274 0.5 11.999 0.5C11.1706 0.5 10.499 1.17157 10.499 2C10.499 2.82843 11.1706 3.5 11.999 3.5Z" fill="currentColor"></path>
                                        </svg>
                                    </button>

                                    <div class="share-btn-setting dropdown-menu dropdown-menu-end">
                                        <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal" data-bs-target="#shareModal">
                                            Share
                                        </button>
                                        <button type="button" class="btn-setting-text report-text" data-bs-toggle="modal" data-bs-target="#reportModal">
                                            Report
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <span class="bid"> <span class="price"></span></span>
                    <h6 class="title-name">
                        {!! $product->details_product !!}.
                    </h6>

                    <div class="rn-bid-details">
                        <div class="tab-wrapper-one">
                            <nav class="tab-button-one">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a href="{{ asset('pdfs/' . $product->pdf) }}" download="{{ $product->slug }}.pdf">
                                        <button class="nav-link active" id="nav-profile-tab" type="button" role="tab" aria-controls="nav-profile" aria-selected="true">
                                            Download PDF Product
                                        </button>
                                    </a>
                                </div>
                            </nav>
                            <div class="tab-content rn-bid-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <!-- single -->
                                    <div class="rn-pd-bd-wrapper">
                                        <!-- single -->
                                        <div class="rn-pd-sm-property-wrapper">
                                            <h6 class="pd-property-title">Category</h6>
                                            <div class="catagory-wrapper">
                                                <!-- single property -->
                                                <div class="pd-property-inner">
                                                    <span class="color-white value">Food and Beverages</span>
                                                </div>
                                                <!-- single property End -->
                                            </div>
                                        </div>
                                        <!-- single -->
                                    </div>
                                    <!-- single -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Add to Cart Button -->
                    <div class="add-to-cart-btn mt-4">
                        <button class="btn btn-primary btn-lg w-100">Add to Cart</button>
                    </div>
                    <!-- End of Add to Cart Button -->

                </div>
            </div>
        </div>
    </div>
</div>


<!-- End product details area -->


<!-- New items Start -->

<!-- New items End -->

<!-- New items Start -->

<!-- New items End -->



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
<!-- Modal -->
<div class="rn-popup-modal placebid-modal-wrapper modal fade" id="placebidModal" tabindex="-1" aria-hidden="true">
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i data-feather="x"></i></button>
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Place a bid</h3>
            </div>
            <div class="modal-body">
                <p>You are about to purchase This Product Form Nuron</p>
                <div class="placebid-form-box">
                    <h5 class="title">Your bid</h5>
                    <div class="bid-content">
                        <div class="bid-content-top">
                            <div class="bid-content-left">
                                <input id="value" type="text" name="value">
                                <span>wETH</span>
                            </div>
                        </div>

                        <div class="bid-content-mid">
                            <div class="bid-content-left">
                                <span>Your Balance</span>
                                <span>Service fee</span>
                                <span>Total bid amount</span>
                            </div>
                            <div class="bid-content-right">
                                <span>9578 wETH</span>
                                <span>10 wETH</span>
                                <span>9588 wETH</span>
                            </div>
                        </div>
                    </div>
                    <div class="bit-continue-button">
                        <a href="connect.html" class="btn btn-primary w-100">Place a bid</a>
                        <button type="button" class="btn btn-primary-alta mt--10" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="rn-product-area rn-section-gapTop">
    <div class="container">
        <div class="row mb--50 align-items-center">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">More Product</h3>
            </div>

        </div>

        <div class="default-exp-wrapper default-exp-expand">
            <div class="inner">
                <div class="filter-select-option">
                    <label class="filter-leble">LIKES</label>
                    <select>
                        <option data-display="Most liked">Most liked</option>
                        <option value="1">Least liked</option>
                    </select>
                </div>

                <div class="filter-select-option">
                    <label class="filter-leble">Category</label>
                    <select>
                        <option data-display="Category">Category</option>
                        <option value="1">Art</option>
                        <option value="1">Photograph</option>
                        <option value="2">Metaverses</option>
                        <option value="4">Potato</option>
                        <option value="4">Photos</option>
                    </select>
                </div>

                <div class="filter-select-option">
                    <label class="filter-leble">Collections</label>
                    <select>
                        <option data-display="Collections">Collections</option>
                        <option value="1">BoredApeYachtClub</option>
                        <option value="2">MutantApeYachtClub</option>
                        <option value="4">Art Blocks Factory</option>
                    </select>
                </div>

                <div class="filter-select-option">
                    <label class="filter-leble">Sale type</label>
                    <select>
                        <option data-display="Sale type">Sale type</option>
                        <option value="1">Fixed price</option>
                        <option value="2">Timed auction</option>
                        <option value="4">Not for sale</option>
                        <option value="4">Open for offers</option>
                    </select>
                </div>

                <div class="filter-select-option">
                    <label class="filter-leble">Price Range</label>
                    <div class="price_filter s-filter clear">
                        <form action="#" method="GET">
                            <div id="slider-range"></div>
                            <div class="slider__range--output">
                                <div class="price__output--wrap">
                                    <div class="price--output">
                                        <span>Price :</span><input type="text" id="amount" readonly>
                                    </div>
                                    <div class="price--filter">
                                        <a class="btn btn-primary btn-small" href="#">Filter</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
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

@endsection
