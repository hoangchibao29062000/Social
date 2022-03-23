<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Điềug c hướng tới tranhủ  
Route::resource('/', PostController::class);
// Điều hướng tới trang đăng Ký
Route::get('/register', function () {
    return view('register',['title' => 'Đăng Ký']);
});
// Điều hướng trang đăng nhập
Route::resource('/login', UserController::class);
// Xử lý đăng nhập
Route::post('/login/checkLogin', [UserController::class, 'checkLogin'])->name('user.login');
// Xử lý đăng ký
Route::post('/registered', [UserController::class, 'store'])->name('user.registered');
// xử lý đăng xuất
Route::get('/logout', [UserController::class, 'checkLogout'])->name('user.logout');

// Điều hướng tới trang bài viết của tôi
Route::get('/myPost', [PostController::class,'myPost'])->name('post.myPost');