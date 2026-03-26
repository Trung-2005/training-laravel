<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Post;

class HomeController extends Controller {
    public function index() {

        // Query Builder
        // $rel = DB::table('users')->get(); // Lấy tất cả dữ liệu từ bảng users
        // $rel = DB::table('users')->first(); // Lấy bản ghi đầu tiên từ bảng users
        // $rel = DB::table('users')->where('id', 2)->first(); // Lấy bản ghi có id = 2 từ bảng users
        // $rel = DB::table('users')->orderBy('created_at', 'desc')->get(); // Lấy tất cả dữ liệu từ bảng users sắp xếp theo created_at giảm dần
        // $rel = DB::table('users')->limit(2)->offset(2)->get(); // Lấy 2 bản ghi từ bảng users bắt đầu từ bản ghi thứ 3 (offset 2)
        // $rel3 = DB::table('users')->insert([
        //     'username' => 'quyet',
        //     'email' => 'quyet@example.com',
        //     'created_at' => date('Y-m-d H:i:s')
        // ]);
        // echo $rel3;
        // $rel4 = DB::table('users')->where('id', 5)->update([
        //     'email' => 'hoang@gmail.com',
        //     'username' => 'hoangD'
        // ]);
        // echo $rel4; 
        // $rel5 = DB::table('users')->where('id', 7)->delete();
        // echo $rel5;



        // SQL 
        // $rel = DB::select("SELECT * FROM users");
        // $datet = date('Y-m-d H:i:s');
        // $rel = DB::insert('INSERT INTO users (username, email, created_at) VALUES (?, ?, ?)', ['trang', 'trang@example.com', $datet]);
        // dd($rel);
        // $rel = DB::update('UPDATE users SET username = ? WHERE id = ?', ['trangbao', 3]);
        // $rel = DB::delete('DELETE FROM users WHERE id = ?', [3]);

        // echo '<pre>';
        // print_r($rel);
        // echo '</pre>';

        // ORM - Eloquent 1
        // Lấy ra toàn bộ dữ liệu
        $res = Post::all();
        // echo '<pre>';
        // print_r($res);
        // echo '</pre>';
        //--
        // Lấy ra bản ghi theo id
        $res2 = Post::find(2);
        // Lấy theo điều kiện
        $res3 = Post::where('content', 'Nội dung bài 2')->get();
        dd($res3);
        // dd($res2);
    }

    public function index2() {
        return 'Controller HomeController 2';
    }

    public function index3() {
        return 'Controller HomeController 3';
    }
}