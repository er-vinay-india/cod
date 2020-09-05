<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/sum', 'sum@index');

// POST METHOD ROUTES
Route::post('/user', 'UserController@add');
Route::post('/address', 'AddressController@add');
Route::post('/order', 'OrderController@add');
Route::post('/orderproduct', 'OrderProductController@add');
Route::post('/productfeature', 'ProductFeatureController@add');
Route::post('/product', 'ProductController@post');

Route::post('/user/delete', 'UserController@delete');

// delete 
Route::delete('/user/{user_guid}', 'UserController@delete');
Route::delete('/product/{product_guid}', 'ProductController@delete');


// GET METHOD ROUTES
Route::get('/user', 'UserController@get');
Route::get('/user/{args}', 'UserController@get');
Route::get('/user/{args}/{args2}', 'UserController@get');

Route::post('/login', 'AuthController@login');
Route::post('/registration', 'AuthController@registration');

Route::get('/product', 'ProductController@get');
Route::get('/product/{args}', 'ProductController@get');
Route::get('/product/{args}/{args2}', 'ProductController@get');

Route::middleware(['cod.auth'])->group(function () {
    Route::post('/logout', 'AuthController@logout');
});


Route::get('/address', 'AddressController@get');
Route::get('/address/{args}', 'AddressController@get');
Route::get('/address/{args}/{args2}', 'AddressController@get');


Route::get('/orderproduct', 'OrderProductController@get');
Route::get('/orderproduct/{args}', 'OrderProductController@get');
Route::get('/orderproduct/{args}/{args2}', 'OrderProductController@get');

Route::get('/productfeature', 'ProductFeatureController@get');
Route::get('/productfeature/{args}', 'ProductFeatureController@get');
Route::get('/productfeature/{args}/{args2}', 'ProductFeatureController@get');


Route::get('/order', 'OrderController@get');
Route::get('/order/{args}', 'OrderController@get');
Route::get('/order/{args}/{args2}', 'OrderController@get');

Route::get('/orders', 'Order@index');
Route::post('/address', 'address@index');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
