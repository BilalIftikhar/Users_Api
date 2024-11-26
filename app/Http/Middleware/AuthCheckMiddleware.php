<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthCheckMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if ($request->is('admin/login') || $request->is('admin/register')) {
                return redirect()->route('admin.dashboard');
            }
        } else {
            if (!$request->is('admin/login') && !$request->is('admin/register')) {
                return redirect()->route('admin.login');
            }
        }

        return $next($request);
    }
}
