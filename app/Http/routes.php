<?php

Route::get('/', [
	'as' => 'home',
	'uses' => 'PageController@home',
]);
