<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Service;

class ApiController extends Controller
{
    // Lấy tất cả dịch vụ
    public function getAllServices()
    {
        $services = Service::all();
        return response()->json($services);
    }

    // Lấy tất cả bài viết
    public function getAllPosts()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    // Lấy dịch vụ theo ID
    public function getServiceById($id)
    {
        $service = Service::find($id);
        if ($service) {
            return response()->json($service, 200);
        } else {
            return response()->json(['message' => 'Service not found'], 404);
        }
    }

    // Lấy bài viết theo ID
    public function getPostById($id)
    {
        $post = Post::find($id);
        if ($post) {
            return response()->json($post, 200);
        } else {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }
}
