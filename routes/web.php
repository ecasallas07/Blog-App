<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
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

Route::get('/register',[RegisterController::class,'show'])->name('auth.show');
Route::post('/register/create',[RegisterController::class,'register'])->name('auth.create');
Route::get('/index',[RegisterController::class,'index'])->name('auth.index');

Route::get('/login',[LoginController::class,'show'])->name('auth.login');
Route::post('/login/authenticate',[LoginController::class,'login'])->name('auth.authenticate');
Route::get('/home',[LoginController::class,'home'])->name('auth.home');

