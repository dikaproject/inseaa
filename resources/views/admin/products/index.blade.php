@extends('admin.components.base')

@section('title', 'Products')

@section('content')
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Products</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Products</li>
        </ul>
    </div>
    <div class="page-header-right ms-auto">
        <div class="page-header-right-items">
            <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                <div class="dropdown">
                    <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                        <i class="feather-paperclip"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="bi bi-filetype-pdf me-3"></i>
                            <span>PDF</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="bi bi-filetype-csv me-3"></i>
                            <span>CSV</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="bi bi-filetype-xml me-3"></i>
                            <span>XML</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="bi bi-filetype-txt me-3"></i>
                            <span>Text</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="bi bi-filetype-exe me-3"></i>
                            <span>Excel</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="javascript:void(0);" class="dropdown-item">
                            <i class="bi bi-printer me-3"></i>
                            <span>Print</span>
                        </a>
                    </div>
                </div>
                <a href="{{ route('admin.products.create') }}" class="btn btn-primary">
                    <i class="feather-plus me-2"></i>
                    <span>Add New Product</span>
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

<div class="col-lg-12">
    <div class="card stretch stretch-full">
        <div class="card-body custom-card-action p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>ID</th>
                            <th>Slug Product</th>
                            <th>Alt Text</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                                <td>#{{ $product->id }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>{{ $product->alt_text }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this product?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                    <a href="{{ route('attachments.create', $product->id) }}" class="btn btn-success btn-sm">Add Attachment</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Check for success message in session
    let successMessage = '{{ session('success') }}';
    if (successMessage) {
        Toastify({
            text: successMessage,
            duration: 3000, // Duration in milliseconds
            gravity: 'top', // 'top' or 'bottom'
            position: 'center', // 'left', 'center', or 'right'
            backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)', // Background gradient
            stopOnFocus: true, // Prevents dismissing of toast on hover
        }).showToast();
    }
</script>
@endsection
