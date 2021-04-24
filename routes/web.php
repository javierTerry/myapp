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


#dd(config('google.visual_token'));

Route::middleware(['auth'])->group(function () {
	#Route::get('/home', 'HomeController@index')->name('home');
});

Route::get('/home', 'HomeController@up_sheet')->name('home');


Route::resource('/login','AuthController');


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
					
			});
	
		});
		Route::resource('equipo','Infra\EquipoController');
		Route::resource('equipoHistorial','Infra\EquipoHistorialController');

	});


});


Route::get('auth/google', 'GoogleController@redirectToGoogle');
Route::get('auth/logout', 'GoogleController@logout');
Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');

