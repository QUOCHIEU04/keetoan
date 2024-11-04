@extends('adminlte::page')

@section('title', 'Service List')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Service List</h3>
        <a href="{{ route('admin.services.create') }}" class="btn btn-primary float-right">Add New Service</a>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.services.index') }}" method="GET">
            <div class="input-group mb-3">
                <input type="text" name="search" class="form-control" placeholder="Search services" value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>SEO Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->seo_title }}</td>
                        <td>{!! Str::limit($service->description, 50) !!}</td>

                        <td>{{ $service->price }}</td>
                        <td>
                            <a href="{{ route('admin.services.show', $service) }}" class="btn btn-info">View</a>
                            <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" style="display:inline-block;">
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
            {{ $services->links() }}
        </div>
    </div>
</div>
@endsection
