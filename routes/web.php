<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Cache; // Import Cache facade
use Illuminate\Http\Request; // Import Request class
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/notify-tb', function () {
    $so1 = app('notify');
    $so2 = app('notify');
    $so3 = app('notify');
    return $so1->index() . '<br>' . $so2->index() . '<br>' . $so3->index();
});


// Facade: cung cấp một giao diện tĩnh để truy cập vào các dịch vụ trong container của Laravel. Facade hoạt động như một "proxy" cho các lớp trong container, cho phép bạn gọi các phương thức của chúng một cách dễ dàng mà không cần phải tạo instance hoặc quản lý dependency injection.
// Helper: là các hàm toàn cục được định nghĩa trong Laravel, giúp bạn thực hiện các tác vụ phổ biến một cách nhanh chóng và dễ dàng. Helper functions thường được sử dụng để xử lý các tác vụ như làm việc với chuỗi, mảng, đường dẫn, và nhiều hơn nữa. Chúng giúp giảm bớt sự phức tạp của mã và làm cho nó dễ đọc hơn.
Route::get('/cache-put-fa', function () {
    // lưu giá trị vào cache
    Cache::put('name', 'Dung Hà', 60); // 60 phút
    return 'Đã lưu giá trị vào cache';
})->name('cache-facade-put');

Route::get('/cache-get-fa', function () {
    // lấy giá trị từ cache
    $name = Cache::get('name');
    return 'Giá trị từ cache: ' . $name;
});


// Route
// Route::get('/tin-tuc', function() {
//     return view('tintuc');
// });

// Route::post('/tin-tuc', function() {
//     return view('pot-new');
// })->name('post-new-tin-tuc');

// Phương thức match: cho phép bạn định nghĩa một route có thể xử lý nhiều phương thức HTTP khác nhau (GET, POST, PUT, DELETE, v.v.) trong cùng một route definition. Điều này giúp bạn tiết kiệm thời gian và mã khi bạn muốn xử lý cùng một URL với nhiều phương thức khác nhau.
// Route::match(['get', 'post'], '/tin-tuc', function(Request $request) {
//     // Kiểm tra phương thức HTTP của request (POST)   
//     if ($request->isMethod('post')) {
//         return view('pot-new');
//     }

//     return view('tintuc');
// })->name('post-new-tin-tuc');

// -------- Bài 13: HTTP Request --------
Route::post('/tin-tuc', [NewsController::class, 'index']);
Route::get('/tin-tuc', [NewsController::class, 'index2']);

// -----  Bài 9  ----
Route::get('/user', function() {
    // lưu tên người dùng vào session
    session(['username' => 'Quang Trung']);
    return 'Đã lưu tên người dùng vào session. Tên người dùng: ' . session('username');
});

// Route liên quan đến việc cập nhật tên người dùng
Route::put('/user', function(Request $request) {
    // lưu tên người dùng vào session
    $newUsername = $request->input('fullname', 'Quang Trung'); // Lấy tên người dùng mới từ request, nếu không có thì sử dụng giá trị mặc định
    session(['username' => $newUsername]);
    return 'Tên sau khi update là: ' . session('username');
})->name('user-put');


// -------- Bài 10 --------
// Route::get('/home-page', [HomeController::class, 'index']);

// Route::get('/home-page2', [HomeController::class, 'index2']);
// Route::get('/home-page3', [HomeController::class, 'index3']);

// Group route: cho phép bạn nhóm các route lại với nhau và áp dụng các middleware, namespace, hoặc prefix chung cho tất cả các route trong nhóm đó. Điều này giúp tổ chức mã của bạn một cách rõ ràng và dễ quản lý hơn.
Route::controller(HomeController::class)->group(function() {
    Route::get('/home-page', 'index');
    Route::get('/home-page2', 'index2');
    Route::get('/home-page3', 'index3');
});

// Prefix route: cho phép bạn thêm một tiền tố chung vào tất cả các route trong nhóm. Điều này rất hữu ích khi bạn muốn tổ chức các route theo một cấu trúc URL cụ thể, chẳng hạn như tất cả các route liên quan đến quản lý người dùng có thể được đặt dưới tiền tố "/admin".
Route::prefix('admin')->name('admin.')->group(function() {
    Route::get('/dashboard', function() {
        return 'Admin Dashboard';
    })->name('dashboard');

    Route::get('/users', function() {
        return 'Admin Users';
    })->name('users');
});


// ------ Bài 11: Middleware --------
// Tạo Middleware: php artisan make:middleware CheckAge
// Middleware là một lớp trung gian được sử dụng để xử lý các yêu cầu HTTP trước khi chúng đến controller hoặc sau khi chúng rời khỏi controller. Middleware có thể được sử dụng để thực hiện các tác vụ như xác thực, kiểm tra quyền truy cập, ghi log, và nhiều hơn nữa. Middleware giúp bạn tách biệt các logic xử lý yêu cầu ra khỏi controller, làm cho mã của bạn trở nên sạch sẽ và dễ bảo trì hơn.
Route::get('/test-middleware', function () {
    return 'Ok luôn';
});

Route::get('/test-middleware?age=20', function () {
    return 'Ok luôn';
});

// middleware cho route cụ thể này
Route::get('/test-middleware/{age}', function () {
    return 'Ok luôn';
})->name('test-age')->middleware('check-age');

// 
Route::get('/test-work/{work}', function () {
    return 'Ok';
})->name('test-age')->middleware('check-work');


// ------ Bài 12: Controller, View --------
// 
Route::controller(ProductController::class)->group(function() {
    Route::get('/product-quantity', 'quantity');
    Route::get('/product-quantity/{soLuong}', 'quantity');
    
});