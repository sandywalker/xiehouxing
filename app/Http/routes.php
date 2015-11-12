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

Route::get('/u/{id}','SpaceController@home');
Route::get('/u/{id}/notes','SpaceController@notes');
Route::get('/u/{id}/favs','SpaceController@favs');
Route::get('/notes/notes','NoteController@notes');


Route::get('/activities/{id}','ActivityController@show');



Route::group(['middleware' => 'user'],function(){
	Route::get('/settings','SettingController@index');
	Route::get('/settings/styles','SettingController@styles');
	Route::post('/settings/styles','SettingController@updateStyles');
	Route::get('/settings/likes','SettingController@likes');
	Route::get('/settings/security','SettingController@security');
	Route::post('/settings/cpass','SettingController@changePassword');
	Route::post('/settings/{id}','SettingController@update');

	
	Route::get('/notes/{id}/delete','NoteController@delete');
	Route::post('notes/{id}/comments','NoteController@storeComments');
	Route::resource('notes','NoteController',['except' => ['index','show']]);


	Route::get('/fav/guide/{id}/fav','FavController@favGuide');
	Route::get('/fav/guide/{id}/unFav','FavController@unFavGuide');

	Route::get('/like/guide/{id}/like','LikeController@likeGuide');
	//Route::get('/like/guide/{id}/unLike','LikeController@unLikeGuide');

	Route::get('/like/note/{id}/like','LikeController@likeNote');

	Route::get('/social/{fId}/follow/{id}','SocialController@follow');
	Route::get('/social/{fId}/unfollow/{id}','SocialController@unFollow');

});
Route::get('/notes','NoteController@index');
Route::get('/notes/{id}','NoteController@show');



Route::get('guides','GuideController@index');
Route::get('guides/list','GuideController@lists');
Route::get('guides/{id}','GuideController@show');
Route::post('guides/{id}/comments','GuideController@storeComments');


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

	Route::resource('adverts', 'AdminAdvertController');


	Route::get('guides/{id}/comments', 'AdminGuideController@guideComments');
	Route::resource('guides', 'AdminGuideController');


	Route::resource('gcomments/{id}/setbest', 'AdminGuideCommentController@setBest');
	Route::resource('gcomments', 'AdminGuideCommentController');

	Route::get('cnotes/{id}/{result}','AdminNoteController@checkNote');
	Route::get('cnotes','AdminNoteController@checkNotes');
	Route::get('notes/{id}/top/{result}', 'AdminNoteController@setTop');
	Route::get('notes/{id}/comments', 'AdminNoteController@noteComments');
	Route::get('notes/{id}/{result}','AdminNoteController@changeStates');
	Route::get('notes','AdminNoteController@index');

	Route::resource('ncomments/{id}/setbest', 'AdminNoteCommentController@setBest');
	Route::resource('ncomments', 'AdminNoteCommentController');

	Route::resource('products', 'AdminProductController');

	Route::get('activities/select/products','AdminActivityController@selectProducts');
	Route::resource('activities', 'AdminActivityController');



});