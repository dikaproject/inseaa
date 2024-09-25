@extends('layouts.base')
@section('title', 'All_product')

@section('allproduct')
    <div class="rn-product-area rn-section-gapTop">
        <div class="container">
            <div class="row mb--50 align-items-center">
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <h3 class="title mb--0" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">Explore Product
                    </h3>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-12 mt_mobile--15">
                    <div class="view-more-btn text-start text-sm-end" data-sal-delay="150" data-sal="slide-up"
                        data-sal-duration="800">
                        <button class="discover-filter-button discover-filter-activation btn btn-primary">Filter<i
                                class="feather-filter"></i></button>
                    </div>
                </div>
            </div>

            <div class="default-exp-wrapper default-exp-expand">
                <div class="inner">

                    <!-- Pastikan form ini mengirimkan data GET -->
                    <!-- Pastikan form ini mengirimkan data GET -->
                    <form method="GET" action="{{ route('view.products.index') }}">
                        <div class="filter-select-option">
                            <label class="filter-label">Category</label>
                            <select name="category" onchange="this.form.submit()">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ request('category') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>


                </div>
            </div>

            <div class="row g-5">
                @foreach ($products as $product)
                    <!-- start single product -->
                    <div data-sal="slide-up" data-sal-delay="150" data-sal-duration="800"
                        class="col-5 col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="product-style-one no-overlay">
                            <div class="card-thumbnail">
                                <a href="{{ route('products.show', $product) }}">
                                    @if ($product->images->isNotEmpty())
                                        <img src="{{ asset('images/' . $product->images->first()->image_path) }}"
                                            alt="{{ $product->images->first()->alt_text }}">
                                    @else
                                        <img src="{{ asset('images/placeholder.png') }}" alt="No image available">
                                    @endif
                                </a>
                            </div>
                            <div class="product-share-wrapper">

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
                                        <button type="button" class="btn-setting-text share-text" data-bs-toggle="modal"
                                            data-bs-target="#shareModal"
                                            data-product-url="{{ route('products.show', $product) }}"
                                            data-product-name="{{ $product->name }}">
                                            Share
                                        </button>
                                        <button type="button" class="btn-setting-text copy-text"
                                            data-product-url="{{ route('products.show', $product) }}">
                                            Copy Link Product
                                        </button>

                                    </div>

                                </div>
                            </div>
                            <a href="{{ route('products.show', $product) }}"><span
                                    class="product-name">{{ $product->name }}</span></a>
                            <span class="latest-bid">{{ $product->category->name }}</span>
                            <div class="bid-react-area">

                            </div>
                        </div>
                    </div>
                    <!-- end single product -->
                @endforeach
            </div>
            <div class="row">
                <div class="col-lg-12" data-sal="slide-up" data-sal-delay="550" data-sal-duration="800">
                    <nav class="pagination-wrapper" aria-label="Page navigation example">
                        {{ $products->links('vendor.pagination.default') }}
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Toast Notification -->
    <div class="toast align-items-center text-bg-primary border-0 position-fixed bottom-0 end-0 m-3" role="alert"
        aria-live="assertive" aria-atomic="true" id="copyToast">
        <div class="d-flex">
            <div class="toast-body">
                Product link copied to clipboard!
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                aria-label="Close"></button>
        </div>
    </div>


    <!-- Share Modal -->
    <div class="rn-popup-modal share-modal-wrapper modal fade" id="shareModal" tabindex="-1" aria-hidden="true">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i
                data-feather="x"></i></button>
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content share-wrapper">
                <div class="modal-header share-area">
                    <h5 class="modal-title">Share this Product</h5>
                </div>
                <div class="modal-body">
                    <ul class="social-share-default">
                        <li><a href="#" id="facebook-share"><span class="icon"><i
                                        data-feather="facebook"></i></span><span class="text">Facebook</span></a></li>
                        <li><a href="#" id="twitter-share"><span class="icon"><i
                                        data-feather="twitter"></i></span><span class="text">Twitter</span></a></li>
                        <li><a href="#" id="linkedin-share"><span class="icon"><i
                                        data-feather="linkedin"></i></span><span class="text">LinkedIn</span></a></li>
                        <li><a href="#" id="whatsapp-share"><span class="icon"><i
                                        data-feather="message-circle"></i></span><span class="text">WhatsApp</span></a>
                        </li>
                        <!-- Add more social media platforms as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script-js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var shareModal = document.getElementById('shareModal');
            shareModal.addEventListener('show.bs.modal', function(event) {
                var button = event.relatedTarget;
                var productUrl = button.getAttribute('data-product-url');
                var productName = button.getAttribute('data-product-name');

                var facebookShare = document.getElementById('facebook-share');
                var twitterShare = document.getElementById('twitter-share');
                var linkedinShare = document.getElementById('linkedin-share');
                var whatsappShare = document.getElementById('whatsapp-share');

                var encodedUrl = encodeURIComponent(productUrl);
                var encodedName = encodeURIComponent(productName);

                facebookShare.href = `https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`;
                twitterShare.href =
                `https://twitter.com/intent/tweet?url=${encodedUrl}&text=${encodedName}`;
                linkedinShare.href = `https://www.linkedin.com/sharing/share-offsite/?url=${encodedUrl}`;
                whatsappShare.href = `https://api.whatsapp.com/send?text=${encodedName}%20${encodedUrl}`;
            });

            // Copy Link Product functionality
            document.addEventListener('click', function(event) {
                if (event.target.matches('.copy-text')) {
                    var button = event.target;
                    var productUrl = button.getAttribute('data-product-url');

                    navigator.clipboard.writeText(productUrl).then(function() {
                        alert('Product link copied to clipboard!');
                    }, function(err) {
                        console.error('Could not copy text: ', err);
                        alert('Failed to copy the product link.');
                    });
                }
            });
        });

        // Replace alert with toast
        var toastEl = document.getElementById('copyToast');
        var toast = new bootstrap.Toast(toastEl);

        navigator.clipboard.writeText(productUrl).then(function() {
            toast.show();
        }, function(err) {
            console.error('Could not copy text: ', err);
            alert('Failed to copy the product link.');
        });
    </script>

@endsection
