<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class isAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Pastikan user sudah login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Cek apakah role-nya admin (idrole == 1)
        $userRole = session('idrole');

        if ($userRole == 1) {
            return $next($request);
        }

        // Kalau bukan admin, tendang balik
        return redirect()->back()->with('error', 'Anda tidak memiliki akses ke halaman ini.');
    }
}
