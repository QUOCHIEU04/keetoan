<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            // Chuyển hướng dựa trên vai trò của người dùng
            if (Auth::user()->role === 'admin') {
                return redirect('/admin/dashboard'); // Trang quản lý của admin
            } elseif (Auth::user()->role === 'client') {
                return redirect('/client/dashboard'); // Trang của client
            }
        }

        return $next($request);
    }
}
