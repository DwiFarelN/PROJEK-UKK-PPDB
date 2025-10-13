<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek jika user belum login
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userRole = auth()->user()->role;
        
        // Cek jika role user tidak termasuk dalam roles yang diizinkan
        if (!in_array($userRole, $roles)) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}