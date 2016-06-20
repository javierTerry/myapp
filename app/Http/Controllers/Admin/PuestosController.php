<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CrearPuestoRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Log;
use App\Model\Puesto;

class PuestosController extends Controller {
	
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$puestos = Puesto::descripcion($request->get('desc'))
								->clave($request->get('clave'))
								->paginate();
		return view('admin.puestos.index', compact('puestos'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		
		return view('admin.puestos.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearPuestoRequest $request)
	{
		
		Log::info('Puesto store');
		$puesto = new Puesto($request->all());
		$puesto->save();
		Log::info('Puesto store save');
		$clave = $request->get('clave_puesto');
		$notices = array("Registro creado, clave : $clave");
		
		$notices = array("Registro creado, clave : $clave");
		return \Redirect::route('admin.puestos.index') -> with ('notices',$notices);
		
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
		Log::info('Puesto editar id: '.$id);
		$puesto = Puesto::findOrFail($id);
		return view('admin.puestos.editar', compact('puesto'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,CrearPuestoRequest $request)
	{
		
		Log::info('Puesto actualizar id: '.$id);
		//	Log::info(print_r(Request::all(),true));
		$puesto = Puesto::findOrFail($id);
		Log::info(print_r($request->all(),TRUE));
		$puesto->fill($request->all());
		Log::info("Fill  exito");
		$puesto->save();
		Log::info("Save exito");
		
		$notices = array("Actualizacion Exitosa");
		return \Redirect::route('admin.puestos.index') -> with ('notices',$notices);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$puesto = Puesto::find($id);
		$puesto->delete();
		$puestos = Puesto::paginate();
		$notices = array("Registro Eliminado");
		return \Redirect::route('admin.puestos.index') -> with ('notices',$notices);
	}

}
