<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticationController extends Controller
{
    public function showLogin() {
        return view('admin.login');
    }

    public function index() {
        return view('admin.dashboard');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        // Add your login logic here
        // $credentials sẽ chứa email và password đã được xác thực hợp lệ, dạng mảng
        // hàm Auth::guard('admin')->attempt() sẽ kiểm tra thông tin đăng nhập dựa trên guard admin đã được cấu hình trong config/auth.php, nếu đăng nhập thành công sẽ trả về true, ngược lại trả về false
        if (Auth::guard('admin')->attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate(); // regenerate session để ngăn chặn session fixation attacks (tấn công chiếm đoạt phiên làm việc)
            return redirect()->intended(route('admin.dashboard')); // intended sẽ tự động chuyển hướng đến trang trước đó mà người dùng cố gắng truy cập trước khi bị chuyển hướng đến trang đăng nhập, nếu không có trang trước đó sẽ chuyển hướng đến route admin.dashboard
        }

        // Authentication failed...
        return back()->withErrors([
            'email' => 'Email hoặc mật khẩu không đúng.',
        ])->onlyInput('email'); // onlyInput sẽ chỉ giữ lại giá trị của trường email trong form khi trả về lỗi, giúp người dùng không phải nhập lại email khi đăng nhập thất bại
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        // $request->session()->invalidate(); // invalidate session để đảm bảo rằng tất cả dữ liệu phiên làm việc hiện tại bị xóa và phiên làm việc không còn hợp lệ nữa
        $request->session()->regenerateToken(); // regenerate token để ngăn chặn CSRF attacks (tấn công giả mạo yêu cầu từ trang khác)
        return redirect()->route('admin.login'); // chuyển hướng đến trang đăng nhập của admin sau khi đăng xuất thành công
    }
}
