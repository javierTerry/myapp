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



Route::group([ 'as' => 'infra.'
	,'prefix' => 'infra'
	, 'namespace' => 'Infra' 
	, 'middleware' => 'auth'
	]	
	, function () {

		Route::get('/equipo/ping', 
			function () {
		    	return '<h1>EQUIPO PING</h1>';
		    }
		);
		
		Route::get('/equipo/alarmado' 
			,[ 'as' => 'infra.equipo.alarmado'
				, 'uses' =>'EquipoController@alarmado'
			]
		#	, function () { 
		#		return "ping exitoso";
		#	}
		);



		Route::resource('infra/equipo','EquipoController');
		Route::resource('equipoHistorial','EquipoHistorialController'
							,['only' => ['store']]
						);

		
	
});

