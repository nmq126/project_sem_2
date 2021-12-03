<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check())
        {
            $user = Auth::user();
            // nếu level = 1 (admin), status = 1 (active) thì cho qua.
            if ($user->level == 1 && $user->status == 1 )
            {
                return $next($request);
            }
            else
            {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect('/login')->with('error', 'Vui lòng đăng nhập bằng tài khoản admin!');
            }
        } else
            return redirect('/login')->with('error', 'Vui lòng đăng nhập trước');
    }
}
