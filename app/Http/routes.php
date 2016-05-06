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
	Route::get('/profile', 'UsersController@profile');
	Route::get('/profile/update', 'UsersController@updateProfile');
	Route::get('/product', 'ProductsController@getProducts');
	Route::get('/product/upload', 'ProductsController@uploadProduct');
    Route::post('/product', 'ProductsController@store');
	//Route::get('/product/add', 'ProductsController@addProduct');
});

Route::auth();

