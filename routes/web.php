<?php

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

/*

Route::get('/', function () {
    return view('welcome');
});

*/
Route::bind('product',function($PRDNUM){
    return App\Product::where('PRDNUM',$PRDNUM)->first();
});

Route::bind('category', function ($category) {
    return App\ProductCategory::where('PRCID',$category)->first();
});

Route::bind('order', function ($order) {
    return App\Order::where('ORDID',$order)->first();
});

Route::bind('user', function ($user) {
    return App\User::where('USRID',$user)->first();
});

Route::get('/',[
    'as' => 'home',
    'uses' => 'StoreControler@index'
]);

Route::get('/home',[
    'as' => 'home',
    'uses' => 'StoreControler@index'
]);

//Detail product
Route::get('product/{PRDNUM}',[
    'as' => 'product-detail',
    'uses' => 'StoreControler@show'
]);

//Category product
Route::get('category/{PRCNAME}',[
    'as' => 'product-category',
    'uses' => 'StoreControler@category'
]);

//Show cart
Route::get('cart/show',[
    'as' => 'cart-show',
    'uses' => 'CartController@show'
]);

//Add item
Route::get('cart/add/{product}',[
    'as' => 'cart-add',
    'uses' => 'CartController@add'
]);

//Delete item
Route::get('cart/delete/{product}',[
    'as' => 'cart-delete',
    'uses' => 'CartController@delete'
]);

//Delete all cart
Route::get('cart/trash',[
    'as' => 'cart-trash',
    'uses' => 'CartController@trash'
]);

//Update quantity
Route::get('cart/update/{product}/{quantity?}',[
    'as' => 'cart-update',
    'uses' => 'CartController@update'
]);

//Oder detail
Route::get('order-detail',[
    'middleware'=>'auth',
    'as'=>'order-detail',
    'uses'=>'CartController@orderDetail'
]);

Route::post('order-confirm',[
    'middleware'=>'auth',
    'as'=>'order_store',
    'uses'=>'CartController@store'
]);

//Confirm order
Route::resource('confirm', 'OrderController');

//Login routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

//Admin - home - routes
Route::get('admin/home',[
    'middleware'=>'auth',
    'as'=>'admin-home',
    'uses'=>'Admin\AdminController@index'
]);

//Admin routes
Route::resource('admin/product', 'Admin\Product\ProductController');

Route::resource('admin/product/category', 'Admin\Product\CategoryController');

Route::resource('admin/order', 'Admin\Order\OrderController');

Route::resource('admin/facture', 'Admin\Order\FactureLineController');

Route::resource('admin/order_categories', 'Admin\Order\CategoriesController');

Route::resource('admin/tracking', 'Admin\Order\TrackingController');

Route::resource('admin/user', 'Admin\UserController');

//User - home - routes
Route::get('user/home',[
    'middleware'=>'auth',
    'as'=>'user-home',
    'uses'=>'Users\UserController@index'
]);

Route::resource('user/order_user', 'Users\OrderController');

Route::resource('user/facture_user', 'Users\FactureLineController');

Route::resource('user/user_edit', 'Users\EditController');

//Tracking
Route::get('tracking',[
    'as' => 'tracking-index',
    'uses' => 'StoreControler@showTracking'
]);

Route::resource('tracking', 'TrackingController');