@extends('layouts.base')

@section('title', 'Allcategory')

@section('allcategory')
    <!-- component -->
    <div class="container-fluid page-header py-5" style="margin-bottom: 6rem;">
        <div class="container py-5">
            <h1 class="display-3 text-white mb-3 animated slideInDown">What We Supply</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                    <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                    <li class="breadcrumb-item text-white active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>

    <section style="background-color: #fff;">
        <div class="container py-5">
            <h4 class="text-center mb-5"><strong>All Category</strong></h4>
            <div class="row wow fadeInUp" data-wow-delay="0.5s">
                @if ($categories->isEmpty())
                        <div class="col-12 text-center">
                            <h2>Category Not Found</h2>
                            <p>Sorry, we couldn't find any categories at the moment.</p>
                        </div>
                    @else
                        @foreach ($categories as $category)
                            <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.3s">
                                <div class="service-item p-4">
                                    <div class="overflow-hidden mb-4">
                                        <img class="img-fluid" src="{{ asset('category_images/' . $category->image ) }}"
                                            alt="">
                                    </div>
                                    <h4 class="mb-3">{{ $category->name }}</h4>
                                    <a class="btn-slide mt-2" href="{{ route('category.detail', $category->slug) }}"><i
                                            class="fa fa-arrow-right"></i><span>Read
                                            More</span></a>
                                </div>
                            </div>
                        @endforeach
                    @endif
            </div>
        </div>
    </section>

    <style>
        /* Custom styles */
        .bg-image {
            position: relative;
            overflow: hidden;
        }

        .bg-image img {
            transition: transform 0.3s ease;
        }

        .bg-image:hover img {
            transform: scale(1.1);
        }

        .hover-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .bg-image:hover .hover-overlay {
            opacity: 1;
        }

        .mask {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px;
            background-color: rgba(0, 0, 0, 0.5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .bg-image:hover .mask {
            opacity: 1;
        }
    </style>


@endsection
