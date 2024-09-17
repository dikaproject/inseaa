@extends('admin.components.base')

@section('title', 'Seller-manage')

@section('content')


<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Seller Manage</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Seller Manage</li>
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

<div class="col-lg-12">
    <div class="card stretch stretch-full">
        <div class="card-body custom-card-action p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>No Telefon</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sellers as $index => $seller)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->email }}</td>
                                <td>{{ $seller->sellerProfile->no_telepon ?? 'N/A' }}</td>
                                <td>
                                    <a href="{{ route('admin.sellers.show', $seller) }}" class="btn btn-info btn-sm">View</a>
                                    {{-- <a href="{{ route('admin.sellers.edit', $seller) }}" class="btn btn-info btn-sm">Edit</a> --}}
                                    <form action="{{ route('admin.sellers.destroy', $seller) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this seller');">
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


