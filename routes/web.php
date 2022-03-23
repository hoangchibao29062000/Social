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
// Điều hướng tới trang chủ  
Route::resource('/', PostController::class);
// Điều hướng trang đăng nhập
Route::resource('/login', UserController::class);
// Xử lý đăng nhập
Route::post('/login/checkLogin', [UserController::class, 'checkLogin'])->name('user.login');
// xử lý đăng xuất
Route::get('/logout', [UserController::class, 'checkLogout'])->name('user.logout');

