<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
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



Route::prefix('admin')->group(function () {
    Route::get('/product/create',[ProductAdminController::class, 'getForm']);
    Route::post('/product/create',[ProductAdminController::class, 'processForm']);
    Route::get('/product/list',[ProductAdminController::class, 'getList']);
    Route::get('/product/list/search',[ProductAdminController::class, 'searchProduct']);
    Route::get('/product/delete/{id}',[ProductAdminController::class, 'delete']);
    Route::get('/product/update/{id}',[ProductAdminController::class, 'updateProduct']);
    Route::post('/product/update/{id}',[ProductAdminController::class, 'delete']);

    Route::post('/products/destroy',[ProductAdminController::class, 'destroy']);
    Route::post('/products/status',[ProductAdminController::class, 'status']);
    Route::post('/products/unstatus',[ProductAdminController::class, 'unsatus']);
    Route::post('/products/featured',[ProductAdminController::class, 'featured']);
    Route::post('/products/unfeatured',[ProductAdminController::class, 'unfeatured']);
//Ingrendient
    Route::get('/product/create/ingredient',[ProductAdminController::class, 'getFormIngredient']);
    Route::post('/product/create/ingredient',[ProductAdminController::class, 'addIngredient']);
    Route::get('/product/list/ingredient',[ProductAdminController::class, 'ListIngredient']);
    Route::get('/product/list/ingredient/delete/{id}',[ProductAdminController::class, 'DeleteIngrendient']);
    Route::get('/product/update/ingredient/{id}',[ProductAdminController::class, 'UpdateView']);
    Route::post('/product/update/ingredient/{id}',[ProductAdminController::class, 'UpdateIngrendient']);

    Route::get('/dashboard', [DashboardController::class, 'Dashboard']);
    Route::get('/dashboard/json', [DashboardController::class, 'DbJson']);
    Route::get('/dashboard/json/month', [DashboardController::class, 'DbJsonMonth']);
    Route::get('/orders', [OrderAdminController::class, 'fetchOrders']);
    Route::get('/orders/update/{id}',[OrderAdminController::class, 'UpdateView']);
    Route::post('/orders/update/{id}',[OrderAdminController::class, 'UpdateOrder']);
    Route::get('/orders/change', [OrderAdminController::class, 'Change']);
    Route::post('/orders/destroy', [OrderAdminController::class, 'Destroy']);
    Route::post('/orders/done', [OrderAdminController::class, 'Done']);
    Route::post('/orders/wait', [OrderAdminController::class, 'Wait']);
    Route::post('/orders/waircheckout', [OrderAdminController::class, 'waircheckout']);
    Route::post('/orders/process', [OrderAdminController::class, 'process']);
    Route::post('/orders/deliver', [OrderAdminController::class, 'deliver']);
    Route::post('/orders/checkall', [OrderAdminController::class, 'checkall']);
    Route::post('/orders/checkallnon', [OrderAdminController::class, 'checkallnon']);
    Route::post('/orders/delete_all', [OrderAdminController::class, 'Deleteall']);
    Route::get('/orders/delete/{id}', [OrderAdminController::class, 'DeleteOrder']);
    Route::get('/orders/search', [OrderAdminController::class, 'search']);
    // Category
    Route::get('/product/create/category',[ProductAdminController::class, 'getFormCategory']);
    Route::post('/product/create/category',[ProductAdminController::class, 'addCategory']);
    Route::get('/product/list/category',[ProductAdminController::class, 'ListCategory']);
    Route::get('/product/list/category/delete/{id}',[ProductAdminController::class, 'DeleteCategory']);
    Route::get('/product/update/category/{id}',[ProductAdminController::class, 'UpdateViewCate']);
    Route::post('/product/update/category/{id}',[ProductAdminController::class, 'UpdateCategory']);


});


Route::get('/download', [OrderAdminController::class, 'export']);

Route::get('/admin/orders/{id}/detail', [OrderDetailsAdminController::class, 'orderDetail']);




//client side

//product list
Route::get('/product/recent-view',[ProductClientController::class, 'getRecent']);
Route::get('/product/{id}',[ProductClientController::class, 'getDetail']);
Route::post('products/search', [ProductClientController::class, 'search']);
Route::get('/products', [ProductClientController::class, 'getList']);

//cart
Route::get('/cart/add',[ShoppingCartController::class, 'add']);
Route::get('/cart',[ShoppingCartController::class, 'show']);
Route::get('/cart/remove',[ShoppingCartController::class, 'remove']);
Route::post('/cart/update',[ShoppingCartController::class, 'update']);

//checkout, order
Route::get('/checkout', [OrderController::class, 'show']);
Route::post('/order', [OrderController::class, 'process']);
Route::get('/order/{id}', [OrderController::class, 'getDetail']);
Route::post('/order/create-payment', [OrderController::class, 'createPayment']);
Route::post('/order/execute-payment', [OrderController::class, 'executePayment']);

//home page
//Route::get('/home', function () {
//    return view('client.home');
//});
Route::get('/home', [HomeController::class, 'show']);


//blog
Route::get('/blog',[BlogController::class, 'getBlog']);
Route::get('/blog-json',[BlogController::class, 'JsonBlog']);
Route::get('/blog_detail/{id}',[BlogController::class, 'getBlogDetail']);

Route::get('/sign_in', function () {
    return view('client.sign_in');
});
Route::get('/sign_up', function () {
    return view('client.sign_up');
});


Route::get('/cart', function () {
    return view('client.cart');
});




Route::get('/product_detail/{id}', [ProductClientController::class, 'getProductDetail']);

Route::get('/products', function () {
    return view('client.products-and-cart.products');
});



