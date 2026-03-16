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
    ->withMiddleware(function (Middleware $middleware): void {
        // Register middleware global: tất cả các route đều phải chạy qua middleware này kiểm tra, kể cả route mặc định-welcome
        // $middleware->append(App\Http\Middleware\CheckAge::class);
        
        // middleware cho route test-age
        $middleware->alias([
            'check-age' => App\Http\Middleware\CheckAge::class,
            'check-work' => App\Http\Middleware\CheckAge::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
