<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;

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

Route::get('/',[HomeController::class,'signup'])->name('signup');

Route::post('/',[UserController::class,'signup'])->name('signup');

Route::get('/login',[HomeController::class,'login'])->name('login');

Route::post('/login',[UserController::class,'logging'])->name('logging');

Route::get('/main',[HomeController::class,'main'])->name('main')->middleware('auth');

Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard')->middleware('auth','admin');

Route::get('/shop',[HomeController::class,'shop'])->name('shop');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/products',[AdminController::class,'products'])->name('products');

Route::post('/products',[ProductsController::class,'products'])->name('products');

Route::get('/test',[AdminController::class,'test'])->name('test');





