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
                    <!-- Form filter untuk kategori -->
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
                            <div class="bid-react-area mt-auto"></div>
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
