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

//Login routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');

//Admin - home - routes
Route::get('admin/home',[
    'middleware'=>'auth',
    'as'=>'admin-home',
    'uses'=>'Admin\AdminController@index'
]);

Route::resource('admin/product', 'Admin\Product\ProductController');

Route::resource('admin/product/category', 'Admin\Product\CategoryController');

Route::resource('admin/order', 'Admin\Order\OrderController');

Route::resource('admin/user', 'Admin\UserController');



//User - home - routes
Route::get('user/home',[
    'middleware'=>'auth',
    'as'=>'user-home',
    'uses'=>'Users\UserController@index'
]);


//Category - admin - routes
/*
Route::get('admin/product/category',[
    'middleware'=>'auth',
    'as'=>'admin-product-category-index',
    'uses'=>'Admin\Product\CategoryController@index'
]);

Route::get('admin/product/category/create',[
    'middleware'=>'auth',
    'as'=>'admin-product-category-create',
    'uses'=>'Admin\Product\CategoryController@create'
]);

Route::post('admin/product/category/show',[
    'middleware'=>'auth',
    'as'=>'admin-product-category-show',
    'uses'=>'Admin\Product\CategoryController@store'
]);

Route::get('admin/product/category/edit/{PRCID}',[
    'middleware'=>'auth',
    'as'=>'admin-product-category-edit',
    'uses'=>'Admin\Product\CategoryController@edit'
]);

Route::get('admin/product/category/update',[
    'middleware'=>'auth',
    'as'=>'admin-product-category-update',
    'uses'=>'Admin\Product\CategoryController@update'
]);
*/

//Route::resource('admin/product/category','Admin\Product\CategoryController');