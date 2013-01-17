<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

// Confide Routes
Route::get( 'user/create',          'UserController@create');
Route::post('user',                 'UserController@store');
Route::get( 'user/login',           'UserController@login');
Route::post('user/login',           'UserController@do_login');
Route::get( 'user/confirm/{code}',  'UserController@confirm');
Route::get( 'user/forgot_password', 'UserController@forgot_password');
Route::post('user/reset_password',  'UserController@reset_password');
Route::get( 'user/logout',          'UserController@logout');
