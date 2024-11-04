<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <!-- Header -->
    <header>
        <nav>
            <a href="{{ url('/') }}" class="logo">Công ty ABC</a>
            <ul>
                <li><a href="{{ url('/services') }}">Dịch Vụ</a></li>
                <li><a href="{{ url('/news') }}">Tin Tức</a></li>
                <li><a href="{{ url('/contact') }}">Liên Hệ</a></li>
            </ul>
        </nav>
    </header>

    <!-- Nội dung chính -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Công ty ABC. Bảo lưu mọi quyền.</p>
    </footer>
</body>
</html>
