<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AfterMiddleware
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);
        
        // Perform action after the request is handled
        // Tambahkan logika apa pun yang perlu dijalankan setelah request ditangani
        
        return $response;
    }
}