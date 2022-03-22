<?php

use App\Http\Controllers\PostController;
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
// Điều hướng vào trang chủ
Route::resource('/', PostController::class);
// Điều hướng vào trang đăng nhập
Route::get('/login', function () {
    return view('login',['title' => 'Đăng Nhập']);
});

