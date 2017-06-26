<?php namespace App\Http\Controllers\Finanzas;

use App\Http\Controllers\Controller;

use Illuminate\Http\Redirect;
use Illuminate\Database\Eloquent\Collection;
use Log;
use File;
use Exception;

use App\Http\Requests\Finanzas\CarterasRequest; //validar si se usara
use App\Model\Finanzas\Carteras;

class CarterasController extends Controller {

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
		$urlupload = 'fnz.carteras.store';
		$carteras  = Carteras::orderBy('created_at', 'DESC') ->groupBy('finanzas_cartera') -> paginate();
		return view('finanzas.cartera.index', compact('carteras', 'urlupload', 'carteras'));
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
	public function store( CarterasRequest $request)
	{
		try{
			Log::info('Carteras store');

			$carteras = new Carteras();
			$carteras -> contenido($request);
			$carteras -> guardar();
			$notices = array("Carga exitosa")	;
			return \Redirect::route('fnz.carteras.index') -> with ('notices',$notices);
		} catch (Exception $e) {
			return \Redirect::route('fnz.carteras.index') -> withErrors ($e -> getMessage());	
		}
													 
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($cartera_periodo)
	{
		Log::info('Carteras show id: '.$cartera_periodo);
		$carteras = new Carteras();
		$seguimientos = $carteras -> procesa($cartera_periodo)
									;

		Log::debug(print_r($seguimientos,TRUE));
		Log::info('Finaliza Carteras show id: '.$cartera_periodo);
		return view('finanzas.cartera.seguimiento', compact('seguimientos'));
		
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
	public function update()
	{
		Log::info('Proyecto actualizar id: '.$id);
		//$finanzas = Finanzas::findOrFail($id);
		Log::info(print_r($request->all(),TRUE));
		//$finanzas->fill($request->all());
		Log::info("Fill  exito");
		//$finanzas->save();
		Log::info("Save exito");
		$Carteras = Finanzas::paginate();
		return view('finanzas.index', compact('Carteras'))->with('notices',array("Proyecto Actualizado"));
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
		Log::info('Carteras destroy id: '.$id);
		$carteras = Carteras::where('cartera_periodo', '=', $id);
		//$carteras = Carteras::where('id', '=', '1');
		//dd($carteras);
		$carteras -> delete();
		$notices = array("Proyecto eliminado - $id");
		Log::info('Finaliza Carteras destroy id: '.$id);
		return \Redirect::route('fnz.carteras.index') -> with ('notices',$notices);
	}

}
