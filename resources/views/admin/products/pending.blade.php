@extends('admin.components.base')

@section('title', 'Pending Products')

@section('content')

<div class="col-lg-12">
    <div class="card stretch stretch-full">
        <div class="card-body custom-card-action p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Seller</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->seller->name }}</td>
                                <td>
                                    <!-- Form untuk Setujui dengan method POST -->
                                    <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-info btn-sm">Setujui</button>
                                    </form>

                                    <!-- Form untuk Tolak dengan method POST dan konfirmasi -->
                                    <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to reject this product?');">
                                        @csrf
                                        @method('POST')
                                        <button type="submit" class="btn btn-danger btn-sm">Tolak</button>
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
