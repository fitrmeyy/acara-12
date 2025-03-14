<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // Untuk keperluan demo, kita hanya memeriksa parameter query 'role'
        // Pada implementasi nyata, Anda akan memeriksa role user dari auth system
        if ($request->query('role') !== $role) {
            return response('Akses ditolak. Anda tidak memiliki role yang diperlukan.', 403);
        }

        return $next($request);
    }
}