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
		$bpos = Bpo::proyecto($request->get('serch_proyecto')) -> proyectoactivo() -> orderBy('created_at', 'DESC')
		
			 -> paginate();
		return view('bpo.index', compact('bpos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	
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
		$bpo = new Bpo($request->all());
		$bpo -> parser();
		$bpo -> save();
	
		$bpos = Bpo::orderBy('created_at', 'DESC') -> paginate();
		$notices = array('BPO creado');
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
		$bpo -> parser();
		$bpo->save();
		Log::info("Save exito");
		$bpos = Bpo::orderBy('created_at', 'DESC') -> paginate();
		return view('bpo.index', compact('bpos'))->with('notices',array("BPO Actualizado"));
	}

	/**
	 * Delete the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Log::info('BPO - Borrando id: '.$id);
		$bpo = Bpo::find($id);
		$bpo -> borradoLogico();
		$bpo -> save();
		//$bpo -> delete();
		$bpos = Bpo::where('status', '=', 1) -> orderBy('created_at', 'DESC') -> paginate();
		Log::info('BPO - Exito al borrar id: '.$id);
		return view('bpo.index', compact('bpos'))->with('notices',array("BPO eliminado"));
	}
	

}
