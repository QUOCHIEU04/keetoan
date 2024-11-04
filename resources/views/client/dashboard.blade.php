@extends('layouts.app')

@section('title', 'Trang chủ - Công ty ABC')
@section('description', 'Trang chủ của Công ty ABC - Cung cấp các dịch vụ tốt nhất')

@section('content')
    <section class="banner">
        <h1>Chào mừng đến với Công ty ABC</h1>
        <p>Chúng tôi cung cấp các giải pháp SEO tốt nhất cho doanh nghiệp của bạn</p>
        <a href="{{ url('/services') }}" class="btn">Khám phá dịch vụ</a>
    </section>

    <section class="posts">
        <h2>Các Bài Viết</h2>
        @foreach ($posts as $post)
            <div class="post">
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->seo_title }}</p>
                <td>{!! $post->content !!}</td>
                <p>{{ $post->seo_description }}</p>
                <p>Hình ảnh: <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" width="50"></p>
                <p>Đã xuất bản: {{ $post->is_published ? 'Có' : 'Không' }}</p>
            </div>
        @endforeach
    </section>
    
@endsection
