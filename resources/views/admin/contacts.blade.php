@extends('admin.components.base')

@section('title', 'Contacts')

@section('content')

<div class="nxl-content">
    <!-- [ page-header ] start -->
    <div class="page-header">
        <div class="page-header-left d-flex align-items-center">
            <div class="page-header-title">
                <h5 class="m-b-10">All Contacts</h5>
            </div>
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Contacts</li>
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
        <div class="col-lg-12">
            <div class="card stretch stretch-full">
                <div class="card-body custom-card-action p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Subject</th>
                                    <th scope="col">Message</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $index => $contact)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->subject }}</td>
                                        <td>{{ Str::limit($contact->message, 50) }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <!-- Delete Contact -->
                                                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this contact?');" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm me-2">
                                                        <i class="feather-trash"></i>
                                                    </button>
                                                </form>

                                                <!-- Reply via Email -->
                                                <a href="mailto:{{ $contact->email }}?subject=Replying%20to%20Your%20Message&body=*Hi%20{{ $contact->first_name }} {{ $contact->last_name }}*%2C%0D%0A%0D%0A> Your Subject : *{{ urlencode($contact->subject) }}*%2C%0D%0A%0D%0A> Your Message : *{{ urlencode($contact->message) }}*%0D%0A%0D%0A> Admin%20Reply : " class="btn btn-success btn-sm me-2">
                                                    <i class="feather-mail"></i>
                                                </a>

                                                <!-- Reply via WhatsApp -->
                                                <a href="https://api.whatsapp.com/send?phone={{ $contact->phone_number }}&text=*Hi%20{{ $contact->first_name }} {{ $contact->last_name }}*%2C%0D%0A%0D%0A> Your Subject : *{{ urlencode($contact->subject) }}*%2C%0D%0A%0D%0A> Your Message : *{{ urlencode($contact->message) }}*%0D%0A%0D%0A> Admin%20Reply : " class="btn btn-info btn-sm">
                                                    <i class="feather-message-circle"></i>
                                                </a>
                                            </div>
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
            duration: 3000, // Duration in milliseconds
            gravity: 'top', // 'top' or 'bottom'
            position: 'center', // 'left', 'center', or 'right'
            backgroundColor: 'linear-gradient(to right, #00b09b, #96c93d)', // Background gradient
            stopOnFocus: true, // Prevents dismissing of toast on hover
        }).showToast();
    }
</script>
@endsection
