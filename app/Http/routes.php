<?php

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

Route::group(['middleware' => ['web']], function () {
	Route::get('/', 'PageController@getHome');
	Route::get('/about', 'PageController@getAbout');
	Route::get('/contact', 'PageController@getContact');
	Route::get('/services', 'PageController@getServices');
	Route::post('/newsletter', 'PageController@postNewsletter');
	Route::post('/contact', 'PageController@postContact');
});
