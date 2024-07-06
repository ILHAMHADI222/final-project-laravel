<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, \Closure $next, $role)
    {
        // Pastikan pengguna terotentikasi
        if (!Auth::check()) {
            return redirect('/login'); // Redirect ke halaman login jika belum login
        }

        // Pastikan peran yang diminta adalah string yang valid
        if ($role !== 'admin' && $role !== 'user') {
            abort(403, 'Unauthorized action.');
        }

        // Ambil peran pengguna yang saat ini terotentikasi
        $userRole = Auth::user()->role;

        // Sesuaikan pengalihan berdasarkan peran yang diberikan
        if ($userRole !== $role) {
            if ($role === 'admin') {
                return redirect()->route('dash'); // Redirect ke dashboard admin jika role admin
            } else {
                return redirect()->route('user.index'); // Redirect ke halaman user jika role user
            }
        }

        return $next($request);
    }
}
