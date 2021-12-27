<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['visual'])->group(function () {
	Route::name('inventario.')->group(function () {
		Route::prefix('inventario')->group(function () {
			Route::get('/historico', 'HomeController@historico')->name('historico');
			Route::get('/activo', 'HomeController@activo')->name('activo');
			Route::get('/inactivo', 'HomeController@inactivo')->name('inactivo');

		});
	});	
});


Route::middleware(['auth'])->group(function () {
	Route::name('infra.')->group(function () {
		Route::prefix('infra')->group(function () {
		    
			Route::resource('dcs','Infra\DataCenterController');
			Route::resource('fase','Infra\FaseController');
			Route::resource('rack','Infra\RackController');
			Route::name('equipo.')->group(function () {
				Route::prefix('equipo')->group(function () {
						Route::get('alarmados', 'Infra\EquipoController@alarmado')->name('alarmado');
				});
			});
			Route::name('equipo.')->group(function () {
				Route::prefix('equipo')->group(function () {
						Route::get('inactivo', 'Infra\EquipoController@inactivo')->name('inactivo');
						Route::get('historico', 'Infra\EquipoController@historico')->name('historico');
						Route::put('{equipo}/edit', 'Infra\EquipoController@byPassHistorico')->name('bypasshistorico');	
				});
			});
			Route::resource('equipo','Infra\EquipoController');
			Route::resource('equipoHistorial','Infra\EquipoHistorialController');
			

		});
	});

	Route::name('auditoria.')->group(function () {
		Route::prefix('auditoria')->group(function () {
			Route::resource('cmdb','AuditoriaController');
		});
	});
});//FIN Route::middleware(['auth'])



Route::resource('/login','AuthController');
Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/logout', 'GoogleController@logout');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');

