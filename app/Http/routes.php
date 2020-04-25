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
Route::get('empleado', 'EmpleadoController@index');
Route::get('empleadoorm', 'EmpleadoController@indexOrm');


Route::group([ 'prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth' ], function () {
	Route::resource('users','UsersController');	 	
	Route::resource('puestos','PuestosController');
	Route::resource('roles','RolesController');
	Route::resource('areas','AreasController');
	Route::resource('estatus','EstatusController');
});


Route::group([ 'prefix' => 'fnz', 'namespace' => 'Finanzas' ], function () {
	Route::resource('proy','ProyectosController');
	Route::resource('carteras','CarterasController');	 	

	Route::get('carteras/ping', function () { return "ping exitoso";});
	Route::get('carteras', 
		[ 'as' => 'fnz.carteras.index'
		, 'uses' =>'CarterasController@index']);
	Route::post('carteras', 
		[ 'as' => 'fnz.carteras.store'
		, 'uses' =>'CarterasController@store']);
});

/**
 * @prefix bpo/proyectos
 * @prefix bpo/proyectos/{id}/seguimientos/
 * @prefix bpo/proyectos/{id}/seguimientos/{id/}
 */
Route::group([ 'prefix' => 'bpo', 'namespace' => 'BPO' ], function () {
	Route::resource('proyectos','BposController');
	
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


Route::get('/api/jwk/token/login', 'Auth\JwtController@index');
Route::get('/api/jwk/token/validations/', 'Auth\JwtController@getAuthenticatedToken');
//Route::group([ 'prefix' => 'api', 'middleware' => 'jwkMiddle'], function () {

Route::group([ 'prefix' => 'api', ], function () {		 
	Route::group([ 'prefix' => 'dbadmins' ], function () {
		Route::group([ 'prefix' => 'respaldos' ], function () {
			Route::get('ping', function () { return "ping exitoso";});
			Route::resource('uploads','HistoryBackupController');
		});

		Route::get('/oracleps/ping', function () { return "ping exitoso";});
		Route::post('/oracleps',	 	
			[ 'as' => 'dbadmins.oracleps.store'
			, 'uses' =>'HistoryBackupController@store']);
		

		Route::get('oracle/ping', function () { return "ping exitoso";});
		Route::post('oracle', 
			[ 'as' => 'dbadmins.oracle.store'
			, 'uses' =>'HistoryBackupController@store']);

		Route::get('sqlserver/ping', function () { return "ping exitoso";});
		Route::post('sqlserver', 
			[ 'as' => 'dbadmins.sqlserver.store'
			, 'uses' =>'HistoryBackupController@store']);
			
	});

	Route::group([ 'prefix' => 'monitores' ], function () {
		Route::get('porsitios/ping', function () { return "ping exitoso";});
		Route::post('porsitios', 
			[ 'as' => 'monitores.porsitios.store'
			, 'uses' =>'Monitoreo\HistoryMonitoreoController@store']);
	});


});

Route::group(['prefix' => 'kpi', 'namespace' => 'Kpi'], function () {
	Route::group(['prefix' => 'aplicaciones'], function ( ) {
		Route::resource("soa",'SoaController');
		/*
		Route::group(['prefix' => 'soa'], function () {
			Route::get('ping', function () { return "ping exitoso";});

		});
		*/
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