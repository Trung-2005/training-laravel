<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::guard('admin')->check()) {
            return redirect('admin/login'); // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập của admin
            // return redirect()->route('admin.login'); // Nếu người dùng chưa đăng nhập, chuyển hướng đến trang đăng nhập của admin
            // nếu dùng route('admin.login') có nghĩa là chuyển hướng đến route có tên là admin.login, trong trường hợp này là route đăng nhập của admin đã được định nghĩa trong routes/web.php
            // nếu dùng redirect('/admin/login') có nghĩa là chuyển hướng đến URL cụ thể là /admin/login, điều này cũng sẽ dẫn đến trang đăng nhập của admin nhưng không sử dụng tên route đã được định nghĩa, nên nếu sau này có thay đổi URL của trang đăng nhập thì sẽ phải cập nhật lại tất cả các nơi sử dụng url('/admin/login'), trong khi nếu dùng route('admin.login') thì chỉ cần cập nhật tên route một lần là đủ, giúp mã nguồn dễ bảo trì hơn
        }
        return $next($request);
    }
}
