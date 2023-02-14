<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\BigposterController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DealController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SpecialController;

use PSpell\Config;

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

Route::post('/',[HomeController::class,'main'])->name('main');


Route::get('/signup',[HomeController::class,'signup'])->name('signup');

Route::post('/signup',[UserController::class,'signup'])->name('signup');

Route::get('/login',[HomeController::class,'login'])->name('login');

Route::post('/login',[UserController::class,'logging'])->name('logging');

// Route::get('/main',[HomeController::class,'main'])->name('main')->middleware('auth');

Route::get('/dashboard',[AdminController::class,'dashboard'])->name('dashboard')->middleware('auth','admin');

Route::get('/dashboard',[DashboardController::class,'adminUser'])->name('dashboard')->middleware('auth','admin');

Route::get('/shop',[HomeController::class,'shop'])->name('shop');

Route::get('/readmore',[HomeController::class,'readmore'])->name('readmore');

Route::get('/cart',[CartController::class,'cart'])->name('cart');

Route::get('/incDecprice',[CartController::class,'incDecprice'])->name('incDecprice');

Route::get('/checkout',[HomeController::class,'checkout'])->name('checkout');

Route::get('/checkout',[CheckoutController::class,'getDatas'])->name('checkout');

Route::get('/data',[HomeController::class,'data'])->name('data');

Route::get('/logout',[UserController::class,'logout'])->name('logout');

Route::get('/products',[AdminController::class,'products'])->name('products')->middleware('auth','admin');

Route::get('/addproducts',[ProductsController::class,'addProducts'])->name('add-products');

Route::get('/specialproducts',[SpecialController::class,'SpecialProducts'])->name('special-products');

Route::post('/specialproducts',[SpecialController::class,'addSpecialProducts'])->name('special-products');

Route::get('/priceFilter',[HomeController::class,'priceFilter'])->name('priceFilter');

Route::get('/boxFilter',[HomeController::class,'boxFilter'])->name('boxFilter');

Route::get('/contact',[HomeController::class,'contact'])->name('contact');

Route::post('/contact', [ContactController::class, 'contact'])->name('contact');

Route::get('/contacts',[AdminController::class,'contacts'])->name('contacts');

Route::post('/products',[ProductsController::class,'products'])->name('products');

Route::get('/category',[AdminController::class,'category'])->name('category')->middleware('auth','admin');

Route::post('/category',[CategoryController::class,'category'])->name('category');

Route::post('/brander',[BrandController::class,'brander'])->name('brander');
 
Route::post('/add-cart',[CartController::class,'addCart'])->name('add-cart');

Route::post('/delete-cart/{id}',[CartController::class,'deleteCart'])->name('deletecart');

Route::get('/brander',[BrandController::class,'getBrander'])->name('brander');

Route::get('/delete/{id}',[AdminController::class,'delete'])->name('delete')->middleware('auth','admin');

Route::get('/productdelete/{id}',[AdminController::class,'productdelete'])->name('productdelete')->middleware('auth','admin');

Route::get('/editcategory/{id}',[AdminController::class,'editcategory'])->name('editcategory');

Route::get('/get-product/{id}',[HomeController::class,'getProduct'])->name('get-product');

Route::get('/categoryedit',[AdminController::class,'categoryedit'])->name('categoryedit');

Route::post('/categoryedit',[AdminController::class,'editingcategory'])->name('categoryedit');

Route::get('/bigposter',[BigposterController::class,'bigposter'])->name('bigposter');

Route::post('/bigposter',[BigposterController::class,'send'])->name('bigposter');

Route::get('/departments',[DepartmentController::class,'getDepartment'])->name('departments');

Route::post('/departments',[DepartmentController::class,'addDepartment'])->name('departments');

Route::get('/departmentView/{id}',[DepartmentController::class,'getDepartmentView'])->name('departmentthis');

Route::post('/deals',[DealController::class,'addDeal'])->name('deals');

Route::post('/dealshow',[DealController::class,'dealShow'])->name('dealshow');

Route::get('/deals',[DealController::class,'getDeal'])->name('deals');

Route::get('/test',[TestController::class,'test'])->name('test');

Route::post('/test',[TestController::class,'test'])->name('test');

Route::post('/clear',[TestController::class,'clear'])->name('clearevery');

Route::get('/forgotit',[UserController::class,'forgot'])->name('forgotit');

Route::post('/forgotit',[UserController::class,'reset'])->name('forgotit');
Route::get('/aboutUs',[HomeController::class,'about'])->name('aboutUs');

Route::post('/addimg',[UserController::class,'addImg'])->name('addimg');
















