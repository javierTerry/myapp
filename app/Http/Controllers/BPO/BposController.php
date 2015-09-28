<?php namespace App\Http\Controllers\BPO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Log;

use App\Http\Requests\CrearBpoRequest;
use App\Model\Bpo;

class BposController extends Controller {

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
		$bpos = Bpo::paginate();
		//dd($bpos);
		return view('bpo.index', compact('bpos'));
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
		return view('bpo.crear');//, compact('roles','areas','puestos'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CrearBpoRequest $request)
	{
		Log::info('BPO store');
		$bpo = new Bpo();
		$bpo -> proyecto = $request->get('PROYECTO');
		$bpo -> cliente 	= $request->get('CLIENTE');
		$bpo -> proveedor	= $request->get('PROVEEDOR');
		$bpo -> fechaini 	= \Carbon\Carbon::parse($request->get('FECHAINI'));
		$bpo -> fechafin 	= \Carbon\Carbon::parse($request->get('FECHAFIN'));
		$bpo -> fechacompra 	= \Carbon\Carbon::parse($request->get('FECHACOMPRA'));
		$bpo -> costocompro		= $request->get('COSTOCOMPRO');
		$bpo -> costoreal	= $request->get('COSTOREAL');
		$bpo -> precioventa= $request->get('PRECIOVENTA');
		$bpo -> avance= $request->get('AVANCE');
		
		$bpo -> save();
	
		$bpos = Bpo::paginate();
		$notices = array('BPO creado', "Nomina Agregada");
		return view('bpo.index', compact('notices', 'bpos'));
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
		Log::info('BPO editar id: '.$id);
		$bpo = Bpo::findOrFail($id);
		//dd();
		/*$roles = Rol::lists('desc_rol',"clave_rol");
		$areas 	= Area::lists('desc_area','clave_area');
		$puestos= Puesto::lists('desc_puesto','clave_puesto');
		 */
		return view('bpo.editar', compact('bpo'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, CrearBPORequest $request)
	{
		Log::info('BPO actualizar id: '.$id);
		$bpo = Bpo::findOrFail($id);
		Log::info(print_r($request->all(),TRUE));
		$bpo->fill($request->all());
		$bpo->save();
		Log::info("Save exito");
		$bpos = Bpo::paginate();
		return view('bpo.index', compact('bpos'))->with('notices',array("BPO Actualizado"));
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Log::info('BPO - Eliminar id: '.$id);
		$bpo = Bpo::find($id);
		$bpo -> delete();
		$bpos = Bpo::paginate();
		Log::info('BPO - Exito al eliminar id: '.$id);
		return view('bpo.index', compact('bpos'))->with('notices',array("BPO eliminado"));
	}

}
