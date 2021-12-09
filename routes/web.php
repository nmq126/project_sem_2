<?php

use App\Http\Controllers\{BlogController,
    DashboardController,

    HomePageController,
    LoginController,
    OrderAdminController,
    OrderController,
    OrderDetailsAdminController,
    ProductAdminController,
    ProductClientController,
    RegisterController,
    ShoppingCartController};
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
    Route::post('/product/update/{id}',[ProductAdminController::class, 'updateProductForm']);

    Route::post('/products/destroy',[ProductAdminController::class, 'destroy']);
    Route::post('/products/status',[ProductAdminController::class, 'status']);
    Route::post('/products/unstatus',[ProductAdminController::class, 'unsatus']);
    Route::post('/products/featured',[ProductAdminController::class, 'featured']);
    Route::post('/products/unfeatured',[ProductAdminController::class, 'unfeatured']);
//Ingrendient
    Route::get('/ingredient/create',[ProductAdminController::class, 'getFormIngredient']);
    Route::post('/ingredient/create',[ProductAdminController::class, 'addIngredient']);
    Route::get('/ingredient/list',[ProductAdminController::class, 'ListIngredient']);
    Route::get('/ingredient/delete/{id}',[ProductAdminController::class, 'DeleteIngrendient']);
    Route::get('/ingredient/update/{id}',[ProductAdminController::class, 'UpdateView']);
    Route::post('/ingredient/update/{id}',[ProductAdminController::class, 'UpdateIngrendient']);

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
    Route::get('/category/create',[ProductAdminController::class, 'getFormCategory']);
    Route::post('/category/create',[ProductAdminController::class, 'addCategory']);
    Route::get('/category/list',[ProductAdminController::class, 'ListCategory']);
    Route::get('/category/delete/{id}',[ProductAdminController::class, 'DeleteCategory']);
    Route::get('/category/update/{id}',[ProductAdminController::class, 'UpdateViewCate']);
    Route::post('/category/update/{id}',[ProductAdminController::class, 'UpdateCategory']);


});


Route::get('/download', [OrderAdminController::class, 'export']);

Route::get('/admin/orders/{id}/detail', [OrderDetailsAdminController::class, 'orderDetail']);




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


Route::get('/product_detail/{id}', [ProductClientController::class, 'getProductDetail']);
