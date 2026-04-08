<?php

use App\Http\Controllers\Admin\AdminAuthenticationController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'can:access-admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dash', [ProfileController::class, 'showDash'])->name('profile.dashboard');
});

require __DIR__.'/auth.php';


// Viết route cho admin
// ------------- Bài 27 - 28: Multiple Authentication (xác thực đa người dùng) -------------
// -------- Bài 31: Authorization (phân quyền) -------- => Comment những route admin để test "guard web" phía trên

// Route::prefix('admin')->name('admin.')->group(function() {
//     Route::get('/login', [AdminAuthenticationController::class, 'showLogin'])->name('login');
//     Route::post('/login', [AdminAuthenticationController::class, 'login'])->name('login.submit');
    
//     Route::middleware('admin.auth')->group(function() {
//         Route::get('/dashboard', [AdminAuthenticationController::class, 'index'])->name('dashboard');
//         Route::get('/logout', [AdminAuthenticationController::class, 'logout'])->name('logout');
//     });
// });
