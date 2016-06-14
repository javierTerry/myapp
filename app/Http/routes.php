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

Route::get('/api/jwk/token/', 'Auth\JwtController@index');
Route::get('/api/jwk/token/validations/', 'Auth\JwtController@getAuthenticatedToken');

Route::get('home', 'HomeController@index');
Route::get('empleado', 'EmpleadoController@index');
Route::get('empleadoorm', 'EmpleadoController@indexOrm');


Route::group([ 'prefix' => 'admin', 'namespace' => 'Admin' ], function () {
	Route::resource('users','UsersController');	 	
	Route::resource('puestos','PuestosController');
	Route::resource('roles','RolesController');
	Route::resource('areas','AreasController');
	Route::resource('estatus','EstatusController');
});

Route::group([ 'prefix' => 'fnz', 'namespace' => 'Finanzas' ], function () {
	Route::resource('proy','ProyectosController');	 	
});

/**
 * @prefix bpo/proyectos
 * @prefix bpo/proyectos/{id}/seguimientos/
 * @prefix bpo/proyectos/{id}/seguimientos/{id/}
 */
Route::group([ 'prefix' => 'bpo', 'namespace' => 'BPO' ], function () {
	Route::resource('proyectos','BposController');
	
	Route::group(['prefix' => 'proyectos/{id}/seguimientos/'], function () {
		Route::get('/', 
			[ 'as' => 'bpo.proyectos.seguimientos'
			, 'uses' =>'Proyectos\SeguimientosController@index']);
		Route::get('create', 
			[ 'as' => 'bpo.proyectos.seguimientos.index'
			, 'uses' =>'Proyectos\SeguimientosController@create']);
		Route::post('store', 
			[ 'as' => 'bpo.proyectos.seguimientos.store'
			, 'uses' =>'Proyectos\SeguimientosController@store']);
			
		Route::group(['prefix' => '{seguimientoId}/'], function () {
			Route::put('updates/{status}', 
				[ 'as' => 'bpo.proyectos.seguimientos.update'
				, 'uses' =>'Proyectos\SeguimientosController@update']);
			Route::put('updates/', 
				[ 'as' => 'bpo.proyectos.seguimientos.update.form'
				, 'uses' =>'Proyectos\SeguimientosController@update']);
				
			Route::get('edits', 
				[ 'as' => 'bpo.proyectos.seguimientos.edit'
				, 'uses' =>'Proyectos\SeguimientosController@edit']);
		});
	});
	
});

Route::group([ 'prefix' => 'api', 'middleware' => 'jwkMiddle'], function () {		 
	Route::group([ 'prefix' => 'dbadmins' ], function () {	 	
		Route::post('/upload', 'HistoryBackupController@index');
	});
});


Route::group([ 'prefix' => 'guests', 'namespace' => 'Guest' ], function () {
	Route::resource('password','GuestsController');	 	
});



Route::controllers([
	'auth' => 'Auth\AuthController',	
	'password' => 'Auth\PasswordController'
]);

return view('welcome');