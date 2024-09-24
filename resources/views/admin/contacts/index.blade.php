@extends('admin.components.base')

@section('title', 'Contacts')

@section('content')
<div class="nxl-content">
    <div class="page-header">
        <h5 class="m-b-10">Contact Messages</h5>
    </div>
    <div class="main-content">
        <div class="row">
            <table class="table">
                <thead>
                    <tr>
                        <th>From</th>
                        <th>Subject</th>
                        <th>Received At</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                    <tr>
                        <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            @if($contact->isRead())
                                <span class="badge bg-success">Read</span>
                            @else
                                <span class="badge bg-warning">Unread</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-sm btn-primary">View</a>
                            @if(!$contact->isRead())
                                <a href="{{ route('admin.contacts.markAsRead', $contact->id) }}" class="btn btn-sm btn-secondary">Mark as Read</a>
                            @endif
                            <a href="{{ route('admin.contacts.delete', $contact->id) }}" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this contact message?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
