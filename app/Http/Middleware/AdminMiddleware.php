<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->is_admin) { // Giả sử bạn có cột is_admin trong bảng users để xác định quyền admin
            return $next($request);
        }
        
        // Redirect nếu không có quyền admin
        return redirect('/')->with('error', 'You do not have access to this section.');
    }
}
