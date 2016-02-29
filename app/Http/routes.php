<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::get('/','HomeController@index');

Route::group(['middleware' => ['web']], function () {
    //
	Route::get('demo','myDemo@index');

	Route::get('rashmi/{id}','FlyerController@view');
	Route::post('/save','FlyerController@save_flyer');
	Route::post('/photo/{id}','FlyerController@add_photo');
	Route::get('/show','FlyerController@show');
	Route::get('/show/{id}','FlyerController@show_view');
	Route::get('/register','HomeController@register');
	Route::get('/login','HomeController@login');
	Route::get('/logout','HomeController@index');
	Route::delete('/demo/{id}','FlyerController@destroy');

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'FlyerController@index');
	Route::get('/','FlyerController@index');

});
Route::any('/{all}', function(){
	return view('errors.503');
})->where('all', '.*');