<?php namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Log;

use App\User;
use App\Http\Requests\GuestsRequest;
use App\Model\Guest;

class GuestsController extends Controller {

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/*
		$users = User::nombre($request->get('name'))
							->email($request->get('email'))
							->paginate();
		
		
		
		$proyectos = Finanzas::paginate();
		*/
		return view('auth.reset');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		/*$roles 	= array_merge(array("" => "Seleccionar"),Rol::lists('desc_rol','clave_rol'));
		$areas 	= array_merge(array("" => "Seleccionar"),Area::lists('desc_area','clave_area'));
		$puestos= array_merge(array("" => "Seleccionar"),Puesto::lists('desc_puesto','clave_puesto'));
*/
		return view('finanzas.crear');//, compact('roles','areas','puestos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(GuestsRequest $request)
	{
		
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id, GuestsRequest $request)
	{
		Log::info('Usuario actualizar id: '.$id);
		return view('auth.reset', compact('notices', 'errors'));	
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, GuestsRequest $request)
	{
		$user = Guest::findOrFail($id);
		Log::info(print_r($request->all(),TRUE));
		$user->fill($request->all());
		$user -> password = \Hash::make($request->get('password'));
		Log::info("Fill  exito");
		$user->save();
		Log::info("Save exito");
		$notices = array('Password Cambiado con exito');
		return view('auth.reset', compact('notices', 'errors'));
		
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}

}
