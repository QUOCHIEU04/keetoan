<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Chủ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- @vite(['resources/css/app.scss', 'resources/js/app.js']) --}}


    <style>
        .user-info {
            position: fixed;
            top: 10px;
            right: 20px;
            display: inline-block;
            text-align: right;
        }

        .user-info span {
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
        }

        .logout-section {
            display: none;
            margin-top: 5px;
            background-color: #f1f1f1;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .logout-section button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-section button:hover {
            background-color: #e60000;
        }
    </style>
</head>
<body>
    <div class="user-info">
        <span id="toggleLogout">Xin chào, {{ Auth::user()->name }}</span>
        <div id="logoutSection" class="logout-section">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit">Đăng Xuất</button>
            </form>
        </div>
    </div>

    <h1>Chào mừng đến với Trang Chủ!</h1>

  
    
   


    <script>
        document.getElementById('toggleLogout').addEventListener('click', function(event) {
            event.stopPropagation(); // Ngăn sự kiện click lan ra ngoài
            var logoutSection = document.getElementById('logoutSection');
            logoutSection.style.display = (logoutSection.style.display === 'none' || logoutSection.style.display === '') ? 'block' : 'none';
        });

        // Ẩn phần đăng xuất khi nhấp ra ngoài
        document.addEventListener('click', function(event) {
            var logoutSection = document.getElementById('logoutSection');
            var toggleLogout = document.getElementById('toggleLogout');
            if (event.target !== logoutSection && event.target !== toggleLogout) {
                logoutSection.style.display = 'none';
            }
        });
    </script>

    
</body>
</html>


