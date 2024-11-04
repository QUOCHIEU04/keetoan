<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;

class DataDisplayController extends Controller
{
    public function index()
    {
        // Lấy tất cả dữ liệu từ bảng posts và services
        $posts = Post::all();
        $services = Service::all();

        // Truyền dữ liệu vào view
        return view('client.dashboard', compact('posts', 'services'));
    }
}
