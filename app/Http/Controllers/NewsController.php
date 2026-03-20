<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request) {
        // $fullname = $request->input('fullname');
        // $email = $request->input('email');
        // return 'Tên là: '. $fullname . '. Email là: '. $email;

        // $all = $request->all();
        // return view('pot-new', ['data' => $all]);

        // $res = $request->has('fullname'); // kiểm tra xem có tồn tại key fullname trong request hay không
        // return 'Kết quả kiểm tra fullname: '. ($res ? 'Có' : 'Không');

        // $res = $request->method();
        // return 'Phương thức HTTP của request là: '. $res;

        // if ($request->hasFile('thumb')) {
        //     $path = $request->file('thumb')->store('public/images');
        //     return 'File đã upload thành công vào thư muc: '. $path;
        // }
        // return 'Không có file nào được upload.';

        // Validation: kiểm tra dữ liệu đầu vào của request có hợp lệ hay không trước khi xử lý. Nếu dữ liệu không hợp lệ, Laravel sẽ tự động trả về lỗi và thông báo cho người dùng.
        $validated = $request->validate([
            'fullname' => 'required|min:5|max:20',
            'email' => 'required|email'
        ]);
        return 'Dữ liệu hợp lệ với tên người dùng: '. $validated['fullname'];
        // nếu validation thất bại...
    }

    public function index2(Request $request) {
        return view('tintuc');

        // $query = $request->query('key');
        // return 'Giá trị của query key là: '. $query;
    }   
}
