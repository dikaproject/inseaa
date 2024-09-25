@extends('admin.components.base')

@section('title', 'Contact Message')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <h5 class="m-b-10">Contact Message Details</h5>
    </div>
    <div class="main-content">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5>From: {{ $contact->first_name }} {{ $contact->last_name }}</h5>
                    <p><strong>Email:</strong> {{ $contact->email }}</p>
                    <p><strong>Phone:</strong> {{ $contact->phone_number ?? 'N/A' }}</p>
                    <p><strong>Subject:</strong> {{ $contact->subject }}</p>
                    <p><strong>Message:</strong></p>
                    <p>{{ $contact->message }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
