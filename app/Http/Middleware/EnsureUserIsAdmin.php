<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureUserIsAdmin
{
    /**
     * Pastikan user yang login memiliki role admin.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (! Auth::check()) {
            return redirect()->route('login')
                ->with('error', 'Silakan login terlebih dahulu.');
        }

        if (! Auth::user()->isAdmin()) {
            return redirect('/dashboard')
                ->with('error', 'Akses ditolak. Halaman ini khusus administrator.');
        }

        return $next($request);
    }
}
