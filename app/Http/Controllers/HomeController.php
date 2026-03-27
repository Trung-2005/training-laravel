<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Article;

class HomeController extends Controller {
    public function index() {

        // Query Builder: 
        // $res = DB::table('users')->get(); // Lấy tất cả dữ liệu từ bảng users
        // echo '<pre>'; //
        // print_r($res);
        // echo '</pre>'; 
        // $rel2 = DB::table('users')->first(); // Lấy bản ghi đầu tiên từ bảng users
        // $rel3 = DB::table('users')->where('id', 2)->first(); // Lấy bản ghi có id = 2 từ bảng users
        // $rel4 = DB::table('users')->orderBy('created_at', 'desc')->get(); // Lấy tất cả dữ liệu từ bảng users sắp xếp theo created_at giảm dần
        // $rel5 = DB::table('users')->limit(2)->offset(2)->get(); // Lấy 2 bản ghi từ bảng users bắt đầu từ bản ghi thứ 3 (offset 2)
        // $rel6 = DB::table('users')->insert([
        //     'username' => 'thanh',
        //     'email' => 'thanh@example.com',
        //     'created_at' => date('Y-m-d H:i:s') // 
        // ]);//
        // echo $rel6;
        // $rel7 = DB::table('users')->where('id', 4)->update([
        //     'email' => 'hoangc@gmail.com',
        //     'username' => 'hoangc'
        // ]);//
        // echo $rel7; 
        // $rel8 = DB::table('users')->where('id', 7)->delete();
        // echo $rel8;




        // SQL: 
        // --------- select -------
        // $res = DB::select("SELECT * FROM users");
        // dd($res);
        // echo '<pre>'; // 
        // print_r($res); //
        // echo '</pre>'; // 
        // ---------- insert ----------
        // $date = date('Y-m-d H:i:s');
        // $res = DB::insert('INSERT INTO users (username, email, created_at) VALUES (?, ?, ?)', ['loc', 'loc@example.com', $date]);
        // echo $res;
        // ----------- update, delete -----------
        // $res = DB::update('UPDATE users SET username = ? WHERE id = ?', ['trangbao', 2]);
        // $res = DB::delete('DELETE FROM users WHERE id = ?', [3]);
        // echo $res;



        // ORM - Eloquent: 
        // Lấy ra hết toàn bộ dữ liệu
        // $rel1 = Article::all();
        // echo '<pre>'; //
        // print_r($rel1);
        // echo '</pre>'; //
        // Lấy ra bản ghi theo id bằng hàm find()
        // $res2 = Article::find(2);
        // dd($res2); //
        // Lấy theo điều kiện (where)
        // $res3 = Article::where('content', 'Nội dung bài viết 2')->get();
        // dd($res3);
        // ------ insert -------
        // == Cách 1
        // $article = new Article;
        // $article->name = 'Bài viết 3';
        // $article->content = 'Nội dung bài viết 3';
        // $article->save();
        // == Cách 2: cho phép insert qua fillable trong Model
        // $rel4 = Article::create([
        //     'name' => 'Bài viết đặc biệt',
        //     'content' => 'Nội dung bài viết đặc biết'
        // ]);//
        // dd($rel4);
        // --------- update ---------
        // $article2 = Article::find(4);
        // $article2->content = 'Nội dung bài viết đặc biệt 4';
        // $article2->save();
        // == Cách 2: 
        // $rel5 = Article::where('id', 4)->update([
        //     'name' => 'Bài viết đã update'
        // ]);
        // dd($rel5);
        // -------- delete --------
        // $article3 = Article::find(5);
        // $article3->delete();
        // == Cách 2: 
        // $rel6 = Article::destroy(5);
        // dd($rel6);
        // -----------
        // $rel7 = Article::orderBy('created_at', 'desc')->get()->toArray(); // Lấy tất cả dữ liệu từ bảng article sắp xếp theo created_at giảm dần
        // dd($rel7);
        // ----- Lấy 2 dữ liệu từ bảng article sắp xếp theo created_at giảm dần
        // $rel8 = Article::orderBy('created_at', 'desc')->take(2)->get()->toArray();
        // dd($rel8);
        // ------- limit, offset --------
        $rel10 = Article::offset(2)->limit(1)->get()->toArray();
        $rel11 = Article::skip(2)->take(1)->get()->toArray(); // giống rel10

        // dd($rel10);
        dd($rel11);
    } //

    public function index2() {
        return 'Controller HomeController 2';
    }

    public function index3() {
        return 'Controller HomeController 3';
    }
}