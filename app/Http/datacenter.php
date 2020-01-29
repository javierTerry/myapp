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


	Route::group(['prefix' => 'proyectos/{id}/seguimientos'], function () {
		Route::get('/', 
			[ 'as' => 'bpo.proyectos.seguimientos'
			, 'uses' =>'Proyectos\SeguimientosController@index']);
		Route::get('create', 
			[ 'as' => 'bpo.proyectos.seguimientos.index'
			, 'uses' =>'Proyectos\SeguimientosController@create']);
		Route::post('store', 
			[ 'as' => 'bpo.proyectos.seguimientos.store'
			, 'uses' =>'Proyectos\SeguimientosController@store']);
			
		Route::group(['prefix' => '{seguimientoId}'], function () {
			Route::delete('/', 
				[ 'as' => 'bpo.proyectos.seguimientos.destroy'
				, 'uses' =>'Proyectos\SeguimientosController@destroy']);
			Route::put('updates/', 
				[ 'as' => 'bpo.proyectos.seguimientos.update.form'
				, 'uses' =>'Proyectos\SeguimientosController@update']);
				
			Route::get('edits', 
				[ 'as' => 'bpo.proyectos.seguimientos.edit'
				, 'uses' =>'Proyectos\SeguimientosController@edit']);
		});
	});
	
});



return view('welcome');