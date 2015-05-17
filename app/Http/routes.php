<?php

/**
 * The home page
 */
Route::get('/', 'PagesController@home');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
