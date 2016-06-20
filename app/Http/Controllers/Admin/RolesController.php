<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrearRolRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Log;
use App\Model\Rol;

class RolesController extends Controller {
	
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
	public function index(Request $request)
	{
		$roles = Rol::descripcion($request->get('desc'))
								->clave($request->get('clave'))
								->paginate();
		return view('admin.roles.index', compact('roles'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		
		return view('admin.roles.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearRolRequest $request)
	{
		Log::info('Rol store');
		$Rol = new Rol($request->all());
		$Rol->save();
		Log::info('Rol store save');
		$clave = $request->get('clave_rol');
		
	 	$notices = array("Registro creado, clave : $clave");
		return \Redirect::route('admin.roles.index') -> with ('notices',$notices);
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
	public function edit($id)
	{
		Log::info('Rol editar id: '.$id);
		$rol = Rol::findOrFail($id);
		return view('admin.roles.editar', compact('rol'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		
		Log::info('Rol actualizar id: '.$id);
		$rol = Rol::findOrFail($id);
		Log::info(print_r($request->all(),TRUE));
		$rol->fill($request->all());
		Log::info("Fill  exito");
		$rol->save();
		Log::info("Save exito");
		
		$notices = array("Actualizacion Exitosa");
		return \Redirect::route('admin.roles.index') -> with ('notices',$notices);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$rol = Rol::find($id);
		$rol -> delete();
		$roles = Rol::paginate();
		$notices = array("Registro Eliminado");
		return \Redirect::route('admin.roles.index') -> with ('notices',$notices);
	}

}
