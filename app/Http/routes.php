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

Route::get('/', 'HomeController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');


// Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => 'auth'], function()  
// {
// 	Route::get('/', function () {
//     	return view('admin.index');
// 	});  
// });

Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => 'auth'], function()  
{
	Route::get('/', 'AdminHomeController@index');
	Route::get('/dashboard', 'AdminHomeController@dashboard'); 

	Route::get('dicts/main', 'AdminDictController@main');
	Route::get('dicts/{dictId}/items', 'AdminDictItemController@items');
	Route::resource('dicts/items', 'AdminDictItemController');
	Route::resource('dicts', 'AdminDictController');

	Route::get('users/main', 'AdminUserController@main');
	Route::get('users', 'AdminUserController@index');
	Route::get('users/{id}/enable', 'AdminUserController@enableUser');
	Route::get('users/{id}/disable', 'AdminUserController@disableUser');


	Route::get('areas/main', 'AdminAreaController@main');
	Route::resource('areas/{id}/children', 'AdminAreaController@children');
	Route::resource('areas', 'AdminAreaController');

	Route::resource('banners', 'AdminBannerController');


	
});