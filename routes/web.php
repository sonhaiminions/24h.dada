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

Route::get('new23', function () {
	// $new = App\News::where('id', 1)->get();
	// $new = App\News::take(1)->get();
	$new = App\Category::find(2)->TinTuc;
	// var_dump($new);
	// echo $new->title;
	foreach ($new as $key) {
		echo $key->title;
	}

});
Route::get('adduser', 'UserController@viewadd');
Route::get('/', 'HomeController@login');
// route::get('angu', 'AnguController@test12');
Route::get('login', 'HomeController@login');
Route::get('logout', 'HomeController@logout');
Route::post('postlogin', 'HomeController@postlogin');
Route::group(["prefix" => "admin", 'middleware' => 'AdminLogin'], function () {

	Route::group(["prefix" => "category"], function () {
		route::get('list', "CategoryController@list");
		route::get('add', "CategoryController@add");
		route::post("postadd", "CategoryController@postadd");
		route::get('edit/{id}', "CategoryController@edit");
		route::post("postedit/{id}", "CategoryController@postedit");
		route::get('delete/{id}', "CategoryController@delete");
		route::post('search', 'CategoryController@search');
	});
	Route::group(["prefix" => "news"], function () {
		route::get('list', "NewsController@list");
		route::get('add', "NewsController@add");
		route::post("postadd", "NewsController@postadd");
		route::get('edit/{id}', "NewsController@edit");
		route::post("postedit/{id}", "NewsController@postedit");
		route::get('delete/{id}', "NewsController@delete");
		route::post('search', 'NewsController@search');
	});
	Route::group(["prefix" => "user"], function () {
		route::get('list', "UserController@list");
		Route::get('add', "UserController@add");
		route::post('postadd', "UserController@postadd");
		route::get('delete/{id}', 'UserController@delete');
		route::get('edit/{id}', 'UserController@edit');
		route::post('postedit/{id}', 'UserController@postedit');
		route::post('search', 'UserController@search');
	});
});
