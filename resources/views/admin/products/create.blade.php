@extends('admin.components.base')

@section('title', 'Create Product')

@section('content')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Create Product</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Create Product</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex d-md-none">
                    <a href="javascript:void(0)" class="page-header-right-close-toggle">
                        <i class="feather-arrow-left me-2"></i>
                        <span>Back</span>
                    </a>
                </div>
            </div>
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
                        <h5>Create New Product</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Short Description</label>
                                <input type="text" name="description" id="description" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="details_product" class="form-label">Details Full Product</label>
                                <textarea name="details_product" id="tinymce" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug Product</label>
                                <input type="text" name="slug" id="slug" class="form-control" placeholder="Slug Product">
                            </div>
                            <div class="mb-3">
                                <label for="alt_text" class="form-label">Alt Text</label>
                                <input type="text" name="alt_text" id="alt_text" class="form-control" placeholder="Alt Text" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="images">Unggah Gambar Produk</label>
                                <input type="file" name="images[]" id="images" class="form-control" required accept="image/png, image/jpeg" multiple>
                                <small class="text-muted">Anda dapat mengunggah lebih dari satu gambar.</small>
                            </div>
                            <div class="mb-3">
                                <label for="pdf" class="form-label">Upload PDF</label>
                                <input type="file" name="pdf" id="pdf" class="form-control" accept="application/pdf">
                            </div>
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select name="category_id" id="category" class="form-select" required>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

@endsection

@section('scripts_tinymce')
<script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#tinymce',
        width: '100%',
        height: 300,
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen',
            'insertdatetime', 'media', 'table', 'emoticons', 'template', 'help'
        ],
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons | help',
        menubar: 'file edit view insert format tools table help',
    });
</script>
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
