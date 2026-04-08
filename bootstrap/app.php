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

        // middleware cho route admin
        // alias sẽ tạo một bí danh cho middleware, giúp chúng ta dễ dàng sử dụng middleware trong route bằng cách gọi tên alias thay vì phải gọi tên đầy đủ của lớp middleware, ví dụ thay vì phải viết App\Http\Middleware\AdminAuthenticate::class trong route thì chỉ cần viết 'admin:auth' là đủ, điều này giúp mã nguồn ngắn gọn và dễ đọc hơn, đồng thời cũng giúp chúng ta dễ dàng thay đổi lớp middleware mà không cần phải cập nhật tất cả các route sử dụng middleware đó, chỉ cần cập nhật alias một lần là đủ
        $middleware->alias([
            'admin.auth' => App\Http\Middleware\AdminAuthenticate::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
