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

Route::group(['middleware' => ['web']], function () {
    /* Social media authentication */
    Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
    Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
    Route::get('/logout', 'Auth\AuthController@getLogout');
    Route::get('/', ['uses' => 'PagesController@index', 'as' => 'index']);
    Route::get('/dashboard', 'PagesController@dashboard');
});
