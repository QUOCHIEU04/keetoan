<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Models\Post;
use App\Models\Service;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route lấy thông tin người dùng (yêu cầu xác thực với Sanctum)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route API để lấy tất cả dịch vụ
Route::get('/services', [ApiController::class, 'getAllServices']);

// Route API để lấy tất cả bài viết
Route::get('/posts', [ApiController::class, 'getAllPosts']);

// Route API để lấy dịch vụ theo ID
Route::get('/services/{id}', [ApiController::class, 'getServiceById']);

// Route API để lấy bài viết theo ID
Route::get('/posts/{id}', [ApiController::class, 'getPostById']);


// // Route API để lấy tất cả bài viết
// Route::get('/posts', function () {
//     return response()->json(Post::all(), 200);
// });

// // Route API để lấy tất cả dịch vụ
// Route::get('/services', function () {
//     return response()->json(Service::all(), 200);
// });

// // Route API để lấy một bài viết cụ thể theo ID
// Route::get('/posts/{id}', function ($id) {
//     $post = Post::find($id);
//     if ($post) {
//         return response()->json($post, 200);
//     } else {
//         return response()->json(['message' => 'Post not found'], 404);
//     }
// });

// // Route API để lấy một dịch vụ cụ thể theo ID
// Route::get('/services/{id}', function ($id) {
//     $service = Service::find($id);
//     if ($service) {
//         return response()->json($service, 200);
//     } else {
//         return response()->json(['message' => 'Service not found'], 404);
//     }
// });

// // // Route API để lấy tất cả bài viết
// // Route::get('/posts', function () {
// //     return Post::all();
// // });

// // // Route API để lấy tất cả dịch vụ
// // Route::get('/services', function () {
// //     return Service::all();
// // });
