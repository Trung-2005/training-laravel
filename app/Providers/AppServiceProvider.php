<?php

namespace App\Providers;

use App\Services\Notify;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // class, service
        $this->app->bind('notify', function() { // bind: mỗi lần gọi sẽ tạo mới, singleton: mỗi lần gọi sẽ trả về instance cũ
            return new Notify();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // share data, view composer, event listener
    }
}
