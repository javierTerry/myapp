<?php namespace App\Http\Controllers\Kpi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Redirect;
use Log;
use \Carbon\Carbon;
use App\Model\Kpi\Soa;


class SoaController extends Controller {

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
		$urlupload = "kpi.aplicaciones.soa.store";
		$rows = Soa::groupBy('fecha_file') -> paginate(); 
		

		return view('kpi.soa.index', compact('rows', 'urlupload'));
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
	public function store(Request $request)
	{
		$startTime = Carbon::now();
		Log::debug(print_r("Iniciando store ",TRUE));
		$soa = new Soa();
		$soa -> guardarContenido($request);

		
		Log::debug(print_r("Finalizando store ",TRUE));

		$notices =array ("exito", "hora");
		Log::debug(print_r($startTime -> diffForHumans( Carbon::now() ),TRUE));
		return \Redirect::route('kpi.aplicaciones.soa.index') -> with ('notices',$notices);;
			#return "exito";	
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
		$rows = array();
		$rows = Soa::where('fecha_file', '=' , $id) -> paginate(25);
		return view('kpi.soa.show', compact('rows', 'bpos', 'urlupload'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id, Request $request)
	{
		
	}

	/**
	 * Delete the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		
	}
	

}
