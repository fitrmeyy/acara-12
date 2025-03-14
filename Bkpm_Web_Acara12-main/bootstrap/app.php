<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
         // Registrasi middleware global
    $middleware->append(
        \App\Http\Middleware\BeforeMiddleware::class
    );
    
    // Atau untuk named middleware
    $middleware->alias([
        'before' => \App\Http\Middleware\BeforeMiddleware::class,
        'after' => \App\Http\Middleware\AfterMiddleware::class,
        'checkage' => \App\Http\Middleware\CheckAge::class,
        'role' => \App\Http\Middleware\CheckRole::class,
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
