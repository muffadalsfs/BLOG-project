<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Blogcontroller ;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\PasswordResetController;

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
Route::get('/',[Blogcontroller::class,'home']);
//login handle
Route::view('login','login');
Route::view('register','register');
Route::post('login',[LoginController::class,'login'])->name('login');
Route::post('register',[RegisterController::class,'register']);
Route::get('logout',[LoginController::class,'logout']);
Route::controller(Blogcontroller::class)->group(function(){
    Route::middleware('auth')->group(function(){
    Route::post('form','add');
    Route::get('show','show');
    Route::get('delete/{id}','delete');
    Route::get('edit/{id}','edit');
    Route::put('update/{id}', 'update')->name('blog.update');
    });

});
Route::get('detail/{id}', [BlogController::class, 'detail'])->name('blog.detail');
Route::view('blog','blog');

Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLink'])->name('password.email');

Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');
