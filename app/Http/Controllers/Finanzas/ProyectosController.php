<?php namespace App\Http\Controllers\Finanzas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Log;

use App\Http\Requests\CrearProyectoRequest;
use App\Model\Finanzas;

class ProyectosController extends Controller {

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
		$proyectos = Finanzas::paginate();
		
		return view('finanzas.index', compact('proyectos'));
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
	public function store(CrearProyectoRequest $request)
	{
		Log::info('Proyecto store');
		$proyecto = new Finanzas();
		
		$proyecto -> plataforma = $request->get('plataforma');
		$proyecto -> ingresos 	= $request->get('ingresos');
		$proyecto -> fecha_ing 	= \Carbon\Carbon::parse($request->get('fecha_ing'));
		$proyecto -> grossmar	= $request->get('grossmar');
		$proyecto -> ebitda		= $request->get('ebitda');
		$proyecto -> grossideal	= $request->get('grossideal');
		$proyecto -> ebitdaideal= $request->get('ebitdaideal');
		
		$proyecto -> save();
	
		$proyectos = Finanzas::paginate();
		$notices = array('Proyecto creado', "Nomina Agregada");
		return view('finanzas.index', compact('notices', 'proyectos'));
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
		Log::info('Proyecto editar id: '.$id);
		$proyecto = Finanzas::findOrFail($id);
		return view('finanzas.editar', compact('proyecto'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CrearProyectoRequest $request)
	{
		Log::info('Proyecto actualizar id: '.$id);
		$finanzas = Finanzas::findOrFail($id);
		Log::info(print_r($request->all(),TRUE));
		$finanzas->fill($request->all());
		Log::info("Fill  exito");
		$finanzas->save();
		Log::info("Save exito");
		$proyectos = Finanzas::paginate();
		return view('finanzas.index', compact('proyectos'))->with('notices',array("Proyecto Actualizado"));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$proyecto = Finanzas::find($id);
		$proyecto->delete();
		$proyectos = Finanzas::paginate();
		return view('finanzas.index', compact('proyectos'))->with('notices',array("Proyecto eliminado"));
	}

}
