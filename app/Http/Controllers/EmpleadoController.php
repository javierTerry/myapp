<?php namespace App\Http\Controllers;

use App\Empleado;

class EmpleadoController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Empleado Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$result = '';
		
		$result = \DB::table('empleado')->get();
		$result = dd ($result);
		return $result;//"Testo controller de prueba";//view('Empleado');
	}
	
	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function indexOrm()
	{
		$result = Empleado::first();
		
		$result = dd ($result);
		/*
		$result = \DB::table('empleado')->get();
		
		*/
		
		return $result;//"Testo controller de prueba";//view('Empleado');
	}

}
