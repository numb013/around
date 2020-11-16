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
Route::post('/', 'TopController@index');
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
    Route::get('/',         function () { return redirect('/admin/home'); });
    Route::get('login',     'Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('login',    'Admin\LoginController@login');
});

//Admin ログイン後
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function() {
    Route::post('logout','Admin\LoginController@logout')->name('admin.logout');
    Route::get('/home','Admin\HomeController@index')->name('admin.home');
	Route::get('/nanpa_place/','Admin\NanpaPlaceController@index')->name('admin.nanpa_place');
	Route::get('/nanpa_place/admin_detail','NanpaPlaceController@admin_detail')->name('admin.nanpa_place.detail');

	Route::post('/nanpa_place/admin_edit', 'NanpaPlaceController@admin_edit');
	Route::post('/nanpa_place/delete','Admin\NanpaPlaceController@delete')->name('admin.nanpa_place.delete');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
