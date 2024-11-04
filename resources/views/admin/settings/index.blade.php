@extends('adminlte::page')

@section('title', 'Settings')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Settings</h3>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf
            @foreach($settings as $setting)
                <div class="form-group">
                    <label for="{{ $setting->key }}">{{ ucfirst(str_replace('_', ' ', $setting->key)) }}</label>
                    <input type="text" class="form-control" id="{{ $setting->key }}" name="{{ $setting->key }}" value="{{ old($setting->key, $setting->value) }}">
                </div>
            @endforeach
            <button type="submit" class="btn btn-success">Save Settings</button>
        </form>
    </div>
</div>
@endsection
