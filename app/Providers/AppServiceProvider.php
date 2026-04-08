<?php

namespace App\Providers;

use App\Services\Notify;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

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
        Gate::define('access-admin', function($user) {
            return $user->is_admin; // kiểm tra nếu người dùng có thuộc tính is_admin là true thì sẽ được phép truy cập vào các route dành cho admin, ngược lại sẽ bị từ chối truy cập
        }); 
        // fn($user) => $user->is_admin // arrow function (fn) sẽ tự động trả về kết quả của biểu thức sau dấu =>, trong trường hợp này là $user->is_admin, nếu is_admin là true thì sẽ cho phép truy cập vào các route dành cho admin, ngược lại sẽ từ chối truy cập
    }
}
