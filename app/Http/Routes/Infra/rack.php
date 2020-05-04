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



Route::group([ 'prefix' => 'infra'
		, 'namespace' => 'Infra' 
		, 'middleware' => 'auth']
	, function () {

	Route::get('/rack/ping', 
		function () {
	    	return '<h1>DATACENTER PING</h1>';
	    }
	);
	
	Route::resource('rack','RackController');
	
});

