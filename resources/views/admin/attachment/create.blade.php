@extends('admin.components.base')

@section('title', 'Add Attachment')

@section('content')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">Attachment</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Create Attachment</li>
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
                        <h5>Add Attachment</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('attachments.store', $productId) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="pdf-form-container">
                                <div class="pdf-form-group mb-3">
                                    <div>
                                        <label for="attachments" class="form-label">PDF</label>
                                        <input type="file" name="attachments[]" class="form-control" accept="application/pdf" required>
                                    </div>
                                    <div>
                                        <label for="names" class="form-label">Name</label>
                                        <input type="text" name="names[]" class="form-control" required>
                                    </div>
                                    <div>
                                        <label for="descriptions" class="form-label">Description</label>
                                        <textarea name="descriptions[]" class="form-control" required></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-center mt-4">
                                <button type="button" id="add-pdf-button" class="btn btn-secondary">Add Another PDF</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

@endsection

@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Adding dynamic PDF form fields
        document.getElementById("add-pdf-button").addEventListener("click", function() {
            var pdfForm = document.querySelector('.pdf-form-group').cloneNode(true);
            pdfForm.querySelector('input[type="file"]').value = '';
            pdfForm.querySelector('input[type="text"]').value = '';
            pdfForm.querySelector('textarea').value = '';
            document.getElementById("pdf-form-container").appendChild(pdfForm);
        });
    });
</script>

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
