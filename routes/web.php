<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/',[HomeController::class,'signup'])->name('signup');

Route::get('/',[HomeController::class,'main'])->name('main');

Route::get('/signup',[HomeController::class,'signup'])->name('signup');

Route::post('/signup',[UserController::class,'signup'])->name('signup');

Route::get('/login',[HomeController::class,'login'])->name('login');

Route::post('/login',[UserController::class,'logging'])->name('logging');

// Route::get('/main',[HomeController::class,'main'])->name('main')->middleware('auth');

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard')->middleware('auth','admin');

Route::get('/shop',[HomeController::class,'shop'])->name('shop');

Route::get('/buynow',[HomeController::class,'buynow'])->name('buynow');

Route::get('/cart',[HomeController::class,'cart'])->name('cart');

Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');

Route::get('/data',[HomeController::class,'data'])->name('data');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/products',[AdminController::class,'products'])->name('products');

Route::get('/priceFilter',[HomeController::class,'priceFilter'])->name('priceFilter');

Route::get('/boxFilter',[HomeController::class,'boxFilter'])->name('boxFilter');

Route::post('/products',[ProductsController::class,'products'])->name('products');

Route::get('/category',[AdminController::class,'category'])->name('category');

Route::post('/category',[CategoryController::class,'category'])->name('category');

Route::get('/delete/{id}',[AdminController::class,'delete'])->name('delete');

Route::get('/productdelete/{id}',[AdminController::class,'productdelete'])->name('productdelete');

Route::get('/editcategory/{id}',[AdminController::class,'editcategory'])->name('editcategory');

Route::get('/get-product/{id}',[HomeController::class,'getProduct'])->name('get-product');

Route::get('/categoryedit',[AdminController::class,'categoryedit'])->name('categoryedit');

Route::post('/categoryedit',[AdminController::class,'editingcategory'])->name('categoryedit');











