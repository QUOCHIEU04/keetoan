@extends('adminlte::page')

@section('title', 'Post List')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Post List</h3>
        <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-right">Add New Post</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.posts.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search posts" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>SEO Title</th>
                    <th>Content</th>
                    <th>Image</th>
                    <th>Published</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->seo_title }}</td>
                        <td>{!! Str::limit($post->content, 50) !!}</td>
                        <td>
                            @if($post->image)
                                <img src="{{ asset('storage/' . $post->image) }}" width="50">
                            @endif
                        </td>
                        <td>{{ $post->is_published ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('admin.posts.show', $post) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.posts.edit', $post) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-3">
            {{ $posts->links() }}
        </div>
    </div>
</div>
@endsection
