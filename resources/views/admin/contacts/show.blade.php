@extends('adminlte::page')

@section('title', 'Contact Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Contact Details</h3>
        <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary float-right">Back to List</a>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Name</label>
            <p>{{ $contact->name }}</p>
        </div>
        <div class="form-group">
            <label>Email</label>
            <p>{{ $contact->email }}</p>
        </div>
        <div class="form-group">
            <label>Phone</label>
            <p>{{ $contact->phone }}</p>
        </div>
        <div class="form-group">
            <label>Message</label>
            <p>{{ $contact->message }}</p>
        </div>
    </div>
</div>
@endsection
