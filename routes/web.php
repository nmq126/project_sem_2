<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrderAdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderDetailsAdminController;
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
Route::post('/admin/product/create',[ProductAdminController::class, 'processForm']);
Route::get('/admin/product/list',[ProductAdminController::class, 'getList']);
Route::get('/admin/orders', [OrderAdminController::class, 'fetchOrders']);
Route::get('/admin/orders/search', [OrderAdminController::class, 'search']);
Route::get('/admin/orders/{id}/detail', [OrderDetailsAdminController::class, 'orderDetail']);
Route::put('admin/orders/{id}/update', [OrderDetailsAdminController::class, 'updateStatus']);

//client side

//product list
Route::get('/product',[ProductClientController::class, 'getList']);
Route::get('/product/recent-view',[ProductClientController::class, 'getRecent']);
Route::get('/product/{id}',[ProductClientController::class, 'getDetail']);

//cart
Route::get('/cart/add',[ShoppingCartController::class, 'add']);
Route::get('/cart/show',[ShoppingCartController::class, 'show']);
Route::get('/cart/remove',[ShoppingCartController::class, 'remove']);
Route::post('/cart/update',[ShoppingCartController::class, 'update']);
//checkout, order
Route::get('/checkout', [OrderController::class, 'show']);
Route::post('/order', [OrderController::class, 'process']);
Route::get('/order/{id}', [OrderController::class, 'getDetail']);
Route::post('/order/create-payment', [OrderController::class, 'createPayment']);
Route::post('/order/execute-payment', [OrderController::class, 'executePayment']);

Route::get('/blog',[BlogController::class, 'getBlog']);
Route::get('/blog-json',[BlogController::class, 'JsonBlog']);
Route::get('/blog_detail/{id}',[BlogController::class, 'getBlogDetail']);

Route::get('/sign_in', function () {
    return view('client.sign_in');
});
Route::get('/sign_up', function () {
    return view('client.sign_up');
});
Route::get('/home', function () {
    return view('client.home');
});

Route::get('/products', function () {
    return view('client.products-and-cart.products');
});
Route::get('/cart', function () {
    return view('client.products-and-cart.cart');
});




Route::get('/product_detail_1.2', function () {
    return view('client.product_detail.product_detail');
});
Route::get('/products', function (){
   return view('client.products-and-cart.products');
});
