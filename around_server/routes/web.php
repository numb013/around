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

Auth::routes();
Route::get('/', 'TopController@index');
// Route::post('/', 'TopController@index');
Route::get('/nanpa_place', 'NanpaPlaceController@index');
Route::post('/nanpa_place/create', 'NanpaPlaceController@create');
Route::post('/nanpa_place/thanks', 'NanpaPlaceController@send')->name('contact.send');
Route::get('/comment_post', 'CommentPostController@index');
Route::post('/comment_post/create', 'CommentPostController@create');
Route::get('/contact', 'ContactController@index');
Route::post('/contact/confirm', 'ContactController@confirm');
Route::post('/contact/thanks', 'ContactController@send')->name('contact.send');
Route::get('/home', 'HomeController@index')->name('home');


//管理画面
Route::group(['prefix' => 'admin'], function() {
    Route::get('/', function () { return redirect('/admin/home'); });
    Route::get('login', 'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login', 'Admin\LoginController@login');
});

//Admin ログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout','Admin\LoginController@logout')->name('admin.logout');
    Route::get('/home','Admin\HomeController@index')->name('admin.home');


    Route::get('/nanpa_place/admin_index','NanpaPlaceController@adminIndex');
	Route::get('/nanpa_place/admin_create', 'NanpaPlaceController@adminCreate');
	Route::get('/nanpa_place/admin_detail','NanpaPlaceController@adminDetail');
	Route::get('/nanpa_place/admin_edit', 'NanpaPlaceController@adminEdit');
	Route::post('/nanpa_place/admin_search', 'NanpaPlaceController@adminSearch');
	Route::post('/nanpa_place/admin_update', 'NanpaPlaceController@adminUpdate');
	Route::get('/nanpa_place/admin_delete','NanpaPlaceController@adminDelete');
    Route::post('/nanpa_place/complete', 'NanpaPlaceController@adminComplete');

    Route::get('/comment_post/admin_index','CommentPostController@adminIndex');
    Route::get('/comment_post/admin_list','CommentPostController@adminList');
    Route::post('/comment_post/admin_edit', 'CommentPostController@adminEdit');
    Route::post('/comment_post/admin_update', 'CommentPostController@adminUpdate');
    Route::post('/comment_post/admin_delete', 'CommentPostController@adminDelete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
