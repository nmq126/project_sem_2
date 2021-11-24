<?php

use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ProductClientController;
use App\Http\Controllers\ShoppingCartController;
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


Route::get('/admin/product/create',[ProductAdminController::class, 'getForm']);
Route::post('/admin/product/create',[ProductAdminController::class, 'getForm']);
Route::get('/admin/product/list',[ProductAdminController::class, 'getList']);

//                          client side

//product list
Route::get('/product',[ProductClientController::class, 'getList']);
Route::get('/product/recent-view',[ProductClientController::class, 'getRecent']);
Route::get('/product/{id}',[ProductClientController::class, 'getDetail']);

//cart
Route::get('/cart/add',[ShoppingCartController::class, 'add']);
Route::get('/cart/show',[ShoppingCartController::class, 'show']);
Route::get('/cart/remove',[ShoppingCartController::class, 'remove']);
Route::post('/cart/update',[ShoppingCartController::class, 'update']);

Route::get('/blog',[\App\Http\Controllers\BlogController::class, 'getBlog']);
Route::get('/blog-json',[\App\Http\Controllers\BlogController::class, 'JsonBlog']);
Route::get('/blog_detail/{id}',[\App\Http\Controllers\BlogController::class, 'getBlogDetail']);

Route::get('/sign_in', function () {
    return view('client.sign_in');
});
Route::get('/sign_up', function () {
    return view('client.sign_up');
});
Route::get('/home', function () {
    return view('client.home');
});
Route::get('/checkout', function () {
    return view('client.checkout');
});

Route::get('/product_detail', function () {
    return view('client.product_detail.product_detail');
});
