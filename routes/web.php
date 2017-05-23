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


Route::get('/',[
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


//Login routes
Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');