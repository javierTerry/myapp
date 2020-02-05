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



Route::get('/datacenter/ping', 'WelcomeController@index');

Route::group([ 'prefix' => 'infra', 'namespace' => 'Infra' ], function () {
	
	Route::resource('dcs','DataCenterController');
	
});



return view('welcome');