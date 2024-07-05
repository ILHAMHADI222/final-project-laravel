<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, \Closure $next, $role)
    {
        if (!Auth::check() || Auth::user()->role !== $role) {
            \Log::info('User does not have the required role.', ['required' => $role, 'user_role' => Auth::user()->role]);

            return redirect('/');
        }

        return $next($request);
    }
}
