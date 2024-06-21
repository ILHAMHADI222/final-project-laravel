<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class EnsureLoggedOut
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function handle($request, \Closure $next)
    {
        // If the user is logged in and trying to leave the dashboard, redirect back to dash
        if (Auth::check() && !$request->is('dash') && !$request->is('logout')) {
            return redirect()->route('dash');
        }

        return $next($request);
    }
}
