<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            Session::flash('success', 'You\'re already logged in.');
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}
