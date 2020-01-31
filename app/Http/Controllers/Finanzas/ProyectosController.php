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
		$this->middleware('auth');
	}
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index(Request $request)
	{
		$proyectos = Finanzas::orderBy('created_at', 'DESC') -> paginate();
		return view('finanzas.index', compact('proyectos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	
	public function create()
	{
		return view('finanzas.crear');
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
	
		$notices = array('Proyecto creado');
		
		return \Redirect::route('fnz.proy.index') -> with ('notices',$notices);
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
		return \Redirect::route('fnz.proy.index') -> with ('notices',$notices);
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
		
		$notices = array("Proyecto eliminado");
		return \Redirect::route('fnz.proy.index') -> with ('notices',$notices);
	}

}
