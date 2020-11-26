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


/*
Route::get('/', function () {
    return view('welcome');
});

*/
Route::middleware(['auth'])->group(function () {
	Route::get('/home', 'HomeController@index')->name('home');
});



Route::resource('/login','AuthController');
Route::get('/auth/logout', 'LoginController@logout');
Route::post('post-login', 'LoginController@postLogin');
#Route::post('post-login', 'LoginController@postLogin');




Route::name('infra.')->group(function () {
	Route::prefix('infra')->group(function () {
	    
		Route::resource('dcs','Infra\DataCenterController');

		Route::resource('fase','Infra\FaseController');

		Route::resource('rack','Infra\RackController');

		Route::resource('equipo','Infra\EquipoController');

		Route::resource('equipoHistorial','Infra\EquipoHistorialController');

	});


});


Route::get('auth/google', 'GoogleController@redirectToGoogle');

Route::get('auth/google/callback', 'GoogleController@handleGoogleCallback');