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

Route::get('weibo/callback','WeiboController@callback');
Route::get('qq/login','QQController@login');
Route::get('qq/callback','QQController@callback');


// Route::group(['prefix' => 'admin', 'namespace' => 'Admin','middleware' => 'auth'], function()  
// {
// 	Route::get('/', function () {
//     	return view('admin.index');
// 	});  
// });

Route::get('/u/{id}','SpaceController@home');
Route::get('/u/{id}/notes','SpaceController@notes');
Route::get('/u/{id}/favs','SpaceController@favs');
Route::get('/u/{id}/acts','SpaceController@acts');
Route::get('/notes/notes','NoteController@notes');


Route::any('/articles/{tag}','ArticleController@show');

// 微信支付
Route::get('/wxpay/weixin','WxPayController@weixin');
Route::get('/wxpay/qrcode','WxPayController@qrcode');
Route::any('/wxpay/notify','WxPayController@notify');
Route::any('/wxpay/check','WxPayController@check');
Route::any('/wxpay/success','WxPayController@success');
Route::any('/wxpay/failed','WxPayController@failed');


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

	Route::post('activities/{id}/comments','ActivityController@storeComments');

	Route::get('/activities/orders/{id}/cancel','ActivityController@cancelOrder');
	
	Route::get('/activities/{id}/orders/create','ActivityController@createOrder');
	Route::post('/activities/{id}/orders/create','ActivityController@storeOrder');
	Route::get('/activities/{id}/cancel/{memberId}','ActivityController@cancel');
	Route::post('/activities/{id}/join','ActivityController@join');
	Route::get('/activities/orders/{id}','ActivityController@showOrder');
	

});

Route::get('/activities','ActivityController@index');
Route::get('/activities/{id}','ActivityController@show');

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
	Route::delete('notes/{id}','AdminNoteController@delete');

	Route::resource('ncomments/{id}/setbest', 'AdminNoteCommentController@setBest');
	Route::resource('ncomments', 'AdminNoteCommentController');

	Route::resource('products', 'AdminProductController');

	Route::resource('acomments', 'AdminActivityCommentController');

	Route::resource('orders', 'AdminActivityOrderController');

	Route::delete('activities/photos/{id}', 'AdminActivityPhotoController@destroy');
	Route::get('activities/{id}/photos', 'AdminActivityPhotoController@index');
	Route::post('activities/{id}/photos', 'AdminActivityPhotoController@store');
	Route::get('activities/select/products','AdminActivityController@selectProducts');
	Route::resource('activities', 'AdminActivityController');

	Route::resource('seo','AdminSeoController');
	Route::resource('articles','AdminArticleController');





});