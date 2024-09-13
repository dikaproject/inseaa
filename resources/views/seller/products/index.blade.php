@extends('seller.components.base')

@section('title', 'Produk Anda')

@section('content')
<div class="page-header">
    <div class="page-header-left d-flex align-items-center">
        <div class="page-header-title">
            <h5 class="m-b-10">Produk Anda</h5>
        </div>
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('seller.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item">Produk Anda</li>
        </ul>
    </div>
    <div class="page-header-right ms-auto">
        <div class="page-header-right-items">
            <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                <a href="{{ route('seller.products.create') }}" class="btn btn-primary">
                    <i class="feather-plus me-2"></i>
                    <span>Tambah Produk Baru</span>
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
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Slug Produk</th>
                            <th>Alt Text</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $index => $product)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ Str::limit($product->description, 50) }}</td>
                                <td>{{ $product->slug }}</td>
                                <td>{{ $product->alt_text }}</td>
                                <td>
                                    @if($product->status == 'pending')
                                        <span class="badge bg-warning">Menunggu</span>
                                    @elseif($product->status == 'approved')
                                        <span class="badge bg-success">Disetujui</span>
                                    @elseif($product->status == 'rejected')
                                        <span class="badge bg-danger">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('seller.products.edit', $product->id) }}" class="btn btn-info btn-sm">Edit</a>
                                    <form action="{{ route('seller.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                    {{-- Jika Anda ingin menambahkan fitur lampiran untuk seller --}}
                                    {{-- <a href="{{ route('attachments.create', $product->id) }}" class="btn btn-success btn-sm">Tambah Lampiran</a> --}}
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
    // Cek pesan sukses dalam session
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
