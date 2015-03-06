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

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::get('dashboard', 'DashboardController@index');

Route::get('widget/twitter', 'WidgetController@twitter');

Route::get('widget/mlb/', 'WidgetController@mlb');
Route::get('widget/mlb/prev', 'WidgetController@mlb');
Route::get('widget/mlb/next', 'WidgetController@mlb');
Route::get('widget/mlb/{date}', 'WidgetController@mlb');

Route::get('widget/stocks', 'WidgetController@stocks');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
