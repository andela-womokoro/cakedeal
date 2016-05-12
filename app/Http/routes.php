<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Unprotected Routes
Route::get('/', ['uses' => 'PagesController@index', 'as' => 'index']);
Route::get('/login', 'Auth\AuthController@getLogin');
Route::get('/logout', 'Auth\AuthController@getLogout');

// Social media authentication routes
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');


Route::group(['middleware' => ['auth']], function () {
	// Protected routes using 'auth' middleware
	Route::get('/dashboard', 'PagesController@dashboard');
	Route::get('/orders/user', 'OrderController@getUserOrders');
	Route::post('/orders/user', 'OrderController@cancelOrDeleteOrder');
	Route::get('/order/view/{id}', 'OrderController@viewOrder');
	Route::post('/order/view', 'OrderController@changeOrderStatus');
	Route::get('/profile', 'UsersController@profile');
	Route::post('/profile/update', 'UsersController@updateProfile');
	Route::get('/products', 'ProductsController@getProducts');
	Route::get('/products/uploaded', 'ProductsController@userProducts');
	Route::get('/product/upload', 'ProductsController@uploadProduct');
	Route::post('/product/new', 'ProductsController@store');
	Route::get('/product/edit/{id}', 'ProductsController@editProduct');
	Route::post('/product/edit', 'ProductsController@postEditProduct');
	Route::get('/product/delete/{id}', 'ProductsController@deleteProduct');
	Route::post('/make-order/{id}', 'OrderController@store');
	Route::get('/product/{id}', 'OrderController@index');
});

Route::auth();

