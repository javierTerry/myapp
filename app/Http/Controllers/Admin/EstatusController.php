<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CrearEstatusRequest;

use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Log;
use App\Model\Estatus;

class EstatusController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$estatus = Estatus::descripcion($request->get('desc'))
								->clave($request->get('clave'))
								->paginate();
		return view('admin.estatus.index', compact('estatus'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		
		return view('admin.estatus.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearEstatusRequest $request)
	{
		Log::info('Estatus store');
		//dd($request->all());
		$estatus = new Estatus($request->all());
		$estatus->save();
		Log::info('Esatus store save');
		$clave = $request->get('clave_estatus');
		$notices = array("Registro creado, clave : $clave");
		$estatus = Estatus::paginate();
		return view('admin.estatus.index', compact('estatus', 'notices'));
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
		$estatus = Estatus::findOrFail($id);
		return view('admin.estatus.editar', compact('estatus'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id,CrearEstatusRequest $request)
	{
		Log::info('Rol actualizar id: '.$id);
		//	Log::info(print_r(Request::all(),true));
		$estatu = Estatus::findOrFail($id);
		Log::info(print_r($request->all(),TRUE));
		$estatu->fill($request->all());
		Log::info("Fill  exito");
		$estatu->save();
		Log::info("Save exito");
		$estatus = Estatus::paginate();
		$notices = array("Actualizacion Exitosa");
		return view('admin.estatus.index', compact('estatus', 'notices'));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//

		$Rol = Estatus::find($id);
		$Rol->delete();
		$estatus = Estatus::paginate();
		$notices = array("Registro Eliminado");
		return view('admin.estatus.index', compact('estatus','notices'));
	}

}
