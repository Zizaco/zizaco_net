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
	return Redirect::action('PostsController@index'); 
});

Route::get('admin', function()
{
    return Redirect::action('Admin\PostsController@index'); 
});

// Posts
Route::get(    'posts',                'PostsController@index' );
Route::get(    'post',                 'PostsController@index' );
Route::get(    'post/{slug}',          'PostsController@show' );

// Posts
Route::get(    'page/{slug}',          'PagesController@show' );

// Admin/Pages
Route::get(    'admin/pages',          'Admin\PagesController@index' );
Route::get(    'admin/page',           'Admin\PagesController@index' );
Route::get(    'admin/page/create',    'Admin\PagesController@create' );
Route::post(   'admin/page',           'Admin\PagesController@store' );
Route::get(    'admin/page/{id}',      'Admin\PagesController@show' );
Route::get(    'admin/page/{id}/edit', 'Admin\PagesController@edit' );
Route::put(    'admin/page/{id}',      'Admin\PagesController@update' );
Route::delete( 'admin/page/{id}',      'Admin\PagesController@destroy' );

// Admin/Posts
Route::get(    'admin/posts',          'Admin\PostsController@index' );
Route::get(    'admin/post',           'Admin\PostsController@index' );
Route::get(    'admin/post/create',    'Admin\PostsController@create' );
Route::post(   'admin/post',           'Admin\PostsController@store' );
Route::get(    'admin/post/{id}',      'Admin\PostsController@show' );
Route::get(    'admin/post/{id}/edit', 'Admin\PostsController@edit' );
Route::put(    'admin/post/{id}',      'Admin\PostsController@update' );
Route::delete( 'admin/post/{id}',      'Admin\PostsController@destroy' );

// Confide Routes
Route::get(    'user/create',          'UserController@create' );
Route::post(   'user',                 'UserController@store' );
Route::get(    'user/login',           'UserController@login' );
Route::post(   'user/login',           'UserController@do_login' );
Route::get(    'user/confirm/{code}',  'UserController@confirm' );
Route::get(    'user/forgot_password', 'UserController@forgot_password' );
Route::post(   'user/reset_password',  'UserController@reset_password' );
Route::get(    'user/logout',          'UserController@logout' );
