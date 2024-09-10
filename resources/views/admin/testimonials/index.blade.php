@extends('admin.components.base')

@section('title', 'All Testimonials')

@section('content')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">All Testimonials</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Testimonials</li>
            </ul>
        </div>
        <div class="page-header-right ms-auto">
            <div class="page-header-right-items">
                <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                    <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">
                        <i class="feather-plus me-2"></i>
                        <span>Add New Testimonial</span>
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
        <div class="col-lg-12">
            <div class="card stretch stretch-full">
                <div class="card-body custom-card-action p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Message</th>
                                    <th>Rating</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $index => $testimonial)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ Str::limit($testimonial->message, 50) }}</td>
                                        <td>
                                            <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}" class="btn btn-info btn-sm">Edit</a>
                                            <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

@endsection

@section('scripts')
<script>
    // Check for success message in session
    let successMessage = '{{ session('success') }}';
    if (successMessage) {
        Toastify({
            text: successMessage,
            duration: 3000,
            gravity: 'top',
            position: 'center',
            backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)',
            stopOnFocus: true,
        }).showToast();
    }
</script>
@endsection
