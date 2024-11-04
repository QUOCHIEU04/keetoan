<?php

use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\ClientDashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataDisplayController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route cho trang home dành cho người dùng đã đăng nhập
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.dashboard');
        }
        return view('home');
    })->name('home');   
});     

// Route cho trang đăng nhập
Route::get('/login', function () {
    return view('auth.login');
})->middleware('guest')->name('login');

// Xử lý đăng nhập (sử dụng LoginController để chuyển hướng dựa trên vai trò)
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');

// Route điều hướng sau khi đăng nhập
Route::middleware(['auth'])->get('/redirect', function () {
    if (Auth::check() && Auth::user()->is_admin) {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('home');
    }
})->name('redirect');

// Đường dẫn xác thực (register, login, logout)
Auth::routes();

// Route cho trang admin dashboard
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Quản lý dịch vụ
    Route::resource('services', ServiceController::class);

    // Quản lý bài viết
    Route::resource('posts', PostController::class);

    // Quản lý liên hệ (chỉ index, show, destroy)
    Route::resource('contacts', ContactController::class)->only(['index', 'show', 'destroy']);

    // Cài đặt
    Route::get('settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [SettingController::class, 'update'])->name('settings.update');
});