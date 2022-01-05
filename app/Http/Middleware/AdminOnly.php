<?php

namespace App\Http\Middleware;

use App\Helper\Constant;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOnly
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
        if (Auth::check() && Auth::user()->role->name == Constant::$ADMIN_ROLE) {
            return $next($request);
        }

        return redirect()->route('home');
    }
}