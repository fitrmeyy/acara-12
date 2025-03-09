<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BeforeMiddleware
{
    public function handle($request, Closure $next)
    {
        // Perform action before the request is handled
        // Tambahkan logika apa pun yang perlu dijalankan sebelum request ditangani
        
        return $next($request);
    }
}