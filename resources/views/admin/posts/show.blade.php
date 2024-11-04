@extends('adminlte::page')

@section('title', 'View Post')

@section('content')
<div class="card">
    <div class="card-header">Post Details</div>
    <div class="card-body">
        <div class="form-group">
            <label>Title:</label>
            <p>{{ $post->title }}</p>
        </div>

        <div class="form-group">
            <label>SEO Title:</label>
            <p>{{ $post->seo_title }}</p>
        </div>

        <div class="form-group">
            <label>Content:</label>
            <p>{{ $post->content }}</p>
        </div>

        <div class="form-group">
            <label>SEO Description:</label>
            <p>{{ $post->seo_description }}</p>
        </div>

        <div class="form-group">
            <label>Image:</label>
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" width="200" alt="Post Image">
            @else
                <p>No image available</p>
            @endif
        </div>

        <div class="form-group">
            <label>Published:</label>
            <p>{{ $post->is_published ? 'Yes' : 'No' }}</p>
        </div>

        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">Back to List</a>
        <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-primary">Edit Post</a>
    </div>
</div>
@endsection
