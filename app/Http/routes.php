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

Route::group([ 'prefix' => 'bpo', 'namespace' => 'BPO' ], function () {
	Route::resource('proyectos','BposController');	 	
});
Route::controllers([
	'auth' => 'Auth\AuthController',	
	'password' => 'Auth\PasswordController'
//	,'empleado' => 'EmpleadoController'
]);

return view('welcome');