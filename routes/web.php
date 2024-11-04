<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Blogcontroller ;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
route::get('/',[Blogcontroller::class,'home']);
//login handle
Route::view('login','login');
route::view('register','register');
route::view('forget','auth.forgetPassword');
route::post('login',[LoginController::class,'login']);
route::post('register',[RegisterController::class,'register']);
route::get('logout',[LoginController::class,'logout']);
Route::controller(Blogcontroller::class)->group(function(){
    route::middleware('auth')->group(function(){
    Route::post('form','add');
    route::get('show','show');
    route::get('delete/{id}','delete');
    route::get('edit/{id}','edit');
    Route::put('update/{id}', 'update')->name('blog.update');
    });

});
Route::get('detail/{id}', [BlogController::class, 'detail'])->name('blog.detail');
route::view('blog','blog');

Route::get('forget-password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');

Route::post('forget-password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 

Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');

Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');