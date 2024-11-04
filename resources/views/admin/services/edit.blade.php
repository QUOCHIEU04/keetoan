@extends('adminlte::page')

@section('title', isset($service) ? 'Edit Service' : 'Create Service')

@section('content')
<div class="card">
    <div class="card-header">{{ isset($service) ? 'Edit' : 'Create' }} Service</div>
    <div class="card-body">
        <form action="{{ isset($service) ? route('admin.services.update', $service) : route('admin.services.store') }}" method="POST">
            @csrf
            @if(isset($service))
                @method('PUT')
            @endif

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $service->name ?? '') }}" required>
            </div>

            <div class="form-group">
                <label for="seo_title">SEO Title</label>
                <input type="text" class="form-control" id="seo_title" name="seo_title" maxlength="60" value="{{ old('seo_title', $service->seo_title ?? '') }}">
                <small class="form-text text-muted">SEO title should be up to 60 characters.</small>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" required>{{ old('description', $service->description ?? '') }}</textarea>
            </div>

            <div class="form-group">
                <label for="seo_description">SEO Description</label>
                <textarea class="form-control" id="seo_description" name="seo_description" maxlength="160">{{ old('seo_description', $service->seo_description ?? '') }}</textarea>
                <small class="form-text text-muted">SEO description should be up to 160 characters.</small>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01" value="{{ old('price', $service->price ?? '') }}">
            </div>

            <button type="submit" class="btn btn-success">{{ isset($service) ? 'Update' : 'Save' }}</button>
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>

<!-- CKEditor Integration -->
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');
</script>
@endsection
