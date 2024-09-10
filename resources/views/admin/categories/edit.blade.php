@extends('admin.components.base')

@section('title', 'Edit Category')

@section('content')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Edit Category</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Edit Category</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="d-md-none d-flex align-items-center">
                <a href="javascript:void(0)" class="page-header-right-open-toggle">
                    <i class="feather-align-right fs-20"></i>
                </a>
            </div>
        </div>
    </div>
    <!-- [ page-header ] end -->

    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Edit Category <b>( {{ $category->name }} )</b></h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $category->name }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description Category</label>
                                <input type="text" name="description" id="description" class="form-control" value="{{ $category->description }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug Category</label>
                                <input type="text" name="slug" id="slug" class="form-control" value="{{ $category->slug }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="image">Upload Image</label>
                                <input type="file" name="image" id="image" class="form-control" accept="image/png, image/jpeg">
                            </div>
                            <button type="submit" class="btn btn-primary">Confirm Edit Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

@endsection

@section('scripts')
@if ($errors->any())
    <script>
        @foreach ($errors->all() as $error)
            Toastify({
                text: "{{ $error }}",
                duration: 3000,
                gravity: 'top',
                position: 'center',
                backgroundColor: 'linear-gradient(to right, #ff4b1f, #ff9068)',
                stopOnFocus: true,
            }).showToast();
        @endforeach
    </script>
@endif
@endsection
