<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomePageController;
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

//Ingredient
Route::get('/admin/product/create/ingredient',[ProductAdminController::class, 'getFormIngredient']);
Route::post('/admin/product/create/ingredient',[ProductAdminController::class, 'addIngredient']);
Route::get('/admin/product/list/ingredient',[ProductAdminController::class, 'ListIngredient']);
Route::get('/admin/product/list/ingredient/delete/{id}',[ProductAdminController::class, 'DeleteIngrendient']);
Route::get('/admin/product/update/ingredient/{id}',[ProductAdminController::class, 'UpdateView']);
Route::post('/admin/product/update/ingredient/{id}',[ProductAdminController::class, 'UpdateIngrendient']);
// Category
Route::get('/admin/product/create/category',[ProductAdminController::class, 'getFormCategory']);
Route::post('/admin/product/create/category',[ProductAdminController::class, 'addCategory']);
Route::get('/admin/product/list/category',[ProductAdminController::class, 'ListCategory']);
Route::get('/admin/product/list/category/delete/{id}',[ProductAdminController::class, 'DeleteCategory']);
Route::get('/admin/product/update/category/{id}',[ProductAdminController::class, 'UpdateViewCate']);
Route::post('/admin/product/update/category/{id}',[ProductAdminController::class, 'UpdateCategory']);
Route::get('/admin/orders/search/{keyword}', [OrderAdminController::class, 'JsonSearch']);
Route::get('/admin/orders', [OrderAdminController::class, 'fetchOrders'])->middleware('auth.admin');
Route::get('/admin/orders/json', [OrderAdminController::class, 'fetchOrdersJson']);
Route::post('/admin/orders/destroy', [OrderAdminController::class, 'Destroy']);
Route::get('/admin/orders/delete/{id}', [OrderAdminController::class, 'DeleteOrder']);
Route::get('/admin/orders/search', [OrderAdminController::class, 'search']);
Route::get('/admin/orders/{id}/detail', [OrderDetailsAdminController::class, 'orderDetail']);
Route::put('admin/orders/{id}/update', [OrderDetailsAdminController::class, 'updateStatus']);


//CLIENT SIDE

//home page
Route::get('/home', [HomePageController::class, 'show']);

//product list
Route::get('/products', [ProductClientController::class, 'getList']);
Route::get('/product/{id}/details',[ProductClientController::class, 'getDetail']);
Route::post('products/search', [ProductClientController::class, 'search']);
Route::get('/product/recent-view',[ProductClientController::class, 'getRecent']);

//cart
Route::get('/cart',[ShoppingCartController::class, 'show']);
Route::get('/cart/add',[ShoppingCartController::class, 'add']);
Route::get('/cart/remove',[ShoppingCartController::class, 'remove']);
Route::post('/cart/update',[ShoppingCartController::class, 'update']);

Route::group(['middleware' => 'auth'],function (){


    //order
    Route::get('/order/{id}', [OrderController::class, 'getDetail']);
    Route::post('/order/create-payment', [OrderController::class, 'createPayment']);
    Route::post('/order/execute-payment', [OrderController::class, 'executePayment']);
    //account info
    Route::get('/my-account', [LoginController::class, 'showOrder']);
    Route::get('/my-account/order/id={id}', [LoginController::class, 'showOrderDetails']);
});

//checkout
Route::get('/checkout', [OrderController::class, 'show']);
Route::post('/checkout', [OrderController::class, 'process']);


Route::group(['middleware' => 'guest'],function (){
    //đăng ký
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    //đăng nhập
    Route::get('/login', [LoginController::class, 'create']);
    Route::post('/login', [LoginController::class, 'store']);

});
//logout
Route::get('/my-account/logout', [LoginController::class, 'logout']);



//blog
Route::get('/blog',[BlogController::class, 'getBlog']);
Route::get('/blog-json',[BlogController::class, 'JsonBlog']);
Route::get('/blog_detail/{id}',[BlogController::class, 'getBlogDetail']);


Route::get('/contact-us', function () {
    return view('client.contact-us');
});

Route::get('/blog-details', function () {
    return view('client.blog-details');
});


//Route::get('/test_mail', [OrderController::class, 'testMail']);
