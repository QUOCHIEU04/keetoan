<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        // Kiểm tra nếu người dùng đã đăng nhập
        if (Auth::guard($guard)->check()) {
            // Chuyển hướng đến trang chủ nếu đã đăng nhập
            return redirect('/');
        }

        return $next($request);
    }
}
