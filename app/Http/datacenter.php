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

/**
 * @prefix bpo/proyectos
 * @prefix bpo/proyectos/{id}/seguimientos/
 * @prefix bpo/proyectos/{id}/seguimientos/{id/}
 */

Route::group([ 'prefix' => 'datacenter', 'namespace' => 'Datacenter' ], function () {
	#Route::resource('proyectos','BposController');
	Route::get('/', 
			[ 'as' => 'dc.index'
			, 'uses' =>'DataCenterController@index']);


	
	
});



return view('welcome');