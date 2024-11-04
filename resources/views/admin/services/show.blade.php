@extends('adminlte::page')

@section('title', 'Service Details')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Service Details</h3>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary float-right">Back to List</a>
    </div>
    <div class="card-body">
        <div class="form-group">
            <label>Name</label>
            <p>{{ $service->name }}</p>
        </div>

        <div class="form-group">
            <label>SEO Title</label>
            <p>{{ $service->seo_title }}</p>
        </div>

        <div class="form-group">
            <label>Description</label>
            <p>{{ $service->description }}</p>
        </div>

        <div class="form-group">
            <label>SEO Description</label>
            <p>{{ $service->seo_description }}</p>
        </div>

        <div class="form-group">
            <label>Price</label>
            <p>{{ $service->price }}</p>
        </div>
    </div>
</div>
@endsection
