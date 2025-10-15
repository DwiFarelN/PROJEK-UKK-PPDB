<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $roles  // Bisa multiple roles dipisah koma, misal 'admin,siswa'
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // Jika user belum login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $user = Auth::user();

        // Pecah roles menjadi array
        $roles = explode(',', $roles);

        // Jika role user tidak ada di roles yang diizinkan
        if (!in_array($user->role, $roles)) {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }

        // Lanjutkan request
        return $next($request);
    }
}
