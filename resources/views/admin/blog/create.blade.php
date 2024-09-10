@extends('admin.components.base')

@section('title', 'Create Blog')

@section('content')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Create Blog</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Create Blog</li>
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
                        <h5>Create New Blog</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" id="title" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="author" class="form-label">Author</label>
                                <input type="text" name="author" id="author" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="short_description" class="form-label">Short Description</label>
                                <input type="text" name="short_description" id="short_description" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="slug" class="form-label">Slug (URL Link)</label>
                                <input type="text" name="slug" id="slug" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content Blog</label>
                                <textarea name="content" id="tinymce" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Upload Thumbnail</label>
                                <input type="file" name="image" id="image" class="form-control" required accept="image/png, image/jpeg">
                            </div>
                            <button type="submit" class="btn btn-primary">Create Blog</button>
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

@section('scripts_tinymce')
<script src="https://cdn.tiny.cloud/1/{{ env('TINYMCE_API_KEY') }}/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
<script type="text/javascript">
    tinymce.init({
        selector: '#tinymce',
        width: '100%',
        height: 300,
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'visualchars', 'code', 'fullscreen', 'insertdatetime',
            'media', 'table', 'emoticons', 'template', 'help'
        ],
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons | help',
        menu: {
            favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
        },
        menubar: 'favs file edit view insert format tools table help',
    });
</script>
@endsection
