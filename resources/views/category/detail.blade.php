@extends('layouts.base')

@section('title', 'Detail Category')

@section('detailcategory')

<!-- component -->
<link href="{{ asset('assets/css/product.css') }}" rel="stylesheet">

<header class="position-relative">
    <div class="container-fluid p-0">
        <div class="position-relative overflow-hidden" style="height: 70vh;">
            <img src="{{ asset('category_images/' . $category->image ) }}" class="img-fluid blur-image" alt="Header Background" style="object-fit: cover; width: 100%; height: 100%;">
        </div>
    </div>
</header>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center">
                <h2 class="text-uppercase mb-4">{{ $category->name }}</h2>
                <p class="fs-5">{{ $category->description }}</p>
            </div>
        </div>
    </div>
</section>


<body class="wow fadeIn" data-wow-delay="0.7s">
    <div class="container my-5">
        <h2 class="text-center mb-4">Products in {{ $category->name }}</h2>
        <div class="row">
            @if($category->products->isEmpty())
            <div class="col-12 text-center">
                <h2>No Products Available</h2>
                <p>Sorry, we couldn't find any products at the moment.</p>
            </div>
            @else
            @foreach($category->products as $product)
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card h-100 border-0 shadow">
                    <a href="{{ route('products.show', $product) }}" class="card-link">
                        <img src="{{ asset('images/' . $product->images) }}" class="card-img-top" alt="{{ $product->alt_text }}">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm">View Product</a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</body>

@endsection
