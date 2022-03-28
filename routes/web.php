<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
session_start();
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
Route::post('/registered', [UserController::class, 'store'])->name('user.store');
// xử lý đăng xuất
Route::get('/logout', [UserController::class, 'checkLogout'])->name('user.logout');
// đăng bài viết
Route::post('/post', [PostController::class, 'upPost'])->name('post.upPost');
// Điều hướng tới trang bài viết của tôi
Route::get('/myPost', [PostController::class,'myPost'])->name('post.myPost');
// Điều hướng tới trang thông tin cá nhân
Route::get('/myInfo', function () {
    return view('myInfo',['title' => 'Thông Tin Cá Nhân']);
});
// Điều hướng tới trang bạn bè
Route::get('/myFriend', function () {
    return view('myFriend',['title' => 'Bạn Bè']);
});
// Điều hướng tới trang bạn bè
Route::get('/listAddFriend', function () {
    return view('listAddFriend',['title' => 'Danh Sách Kết Bạn']);
});
// Điều hướng tới trang xếp hạng bài viết
Route::get('/ranking', function () {
    return view('ranking',['title' => 'Xếp Hạng Bài Viết']);
});
// Điều hướng tới trang Thông Tin Bài Viết
Route::get('/detailPost', function () {
    return view('detailPost',['title' => 'Thông Tin Bài Viết']);
});
// Chỉnh sửa thông tin cá nhân
Route::post('/editUser', [UserController::class, 'editUser'])->name('user.editUser');
// Thích bài viết
Route::get('/like',[LikeController::class, 'create']);
// Bỏ Thích Bài Viết
Route::get('/unlike',[LikeController::class, 'destroy']);
