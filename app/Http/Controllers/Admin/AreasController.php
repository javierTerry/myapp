<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CrearAreaRequest;

use Log;
use Illuminate\Http\Request;
use App\Model\Area;

class AreasController extends Controller {

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
	 * @return View admin.areas.index
	 */
	public function index(Request $request)
	{
		$areas = Area::descripcion($request->get('desc'))
								->clave($request->get('clave'))
								->paginate();
								
		return view('admin.areas.index', compact('areas'));
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.areas.crear');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearAreaRequest $request)
	{
		Log::info('Areas store');
		$area = new Area($request->all());
		$area->save();
		Log::info('Area store save');
		$clave = $request->get('clave_area');
		$notices = array("Registro creado, clave : $clave");
		$areas = Area::paginate();
		
		return \Redirect::route('admin.areas.index') -> with('notices',$notices);
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
		Log::info('Area editar id: '.$id);
		$area = Area::findOrFail($id);
		return view('admin.areas.editar', compact('area'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CrearAreaRequest $request)
	{
		Log::info('Area actualizar id: '.$id);
		$area = Area::findOrFail($id);
		Log::info(print_r($request->all(),TRUE));
		$area->fill($request->all());
		Log::info("Fill  exito");
		$area->save();
		Log::info("Save exito");
		$notices = array("Actualizacion Exitosa");
		return \Redirect::route('admin.areas.index') -> with('notices',$notices);
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$area = Area::find($id);
		$area->delete();
		$areas = Area::paginate();
		$notices = array("Registro Eliminado");
		return \Redirect::route('admin.areas.index') -> with('notices',$notices);
	}

}
