<?php

namespace App\Http\Controllers\BPO\Proyectos;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Log;
use App\Model\Bpo;
use App\Model\Bpo\Proyectos\Seguimiento;
use App\Http\Requests\SeguimientoRequest;

class SeguimientosController extends Controller
{
	
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
     * Display a resource by Id.
     *
     * @return View bpo.proyectos.index
     */
    public function index($id)
    {
        //
        Log::info('Seguimiento index, id proyecto '.$id);
        $bpos = array(Bpo::find($id));
        $seguimientos = Seguimiento::orderBy('id', 'DESC')
								-> proyectoactivo()
								-> proyectoId($id)
								-> paginate();
								 
		return view('bpo.proyectos.index', compact('bpos', 'seguimientos','notices'));
       
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @param Int $id
     * @return Response
     */
    public function create($id)
    {
        //
        
        $bpos = array(Bpo::find($id));

        $seguimientos = Seguimiento::orderBy('id', 'DESC')
									-> proyectoactivo()
									-> proyectoId($id)
                                 	-> paginate();
                                 
        return view('bpo.proyectos.seguimientos.index', compact('bpos', 'seguimientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(SeguimientoRequest $request, $id)
    {
        //
        Log::info('BPO - Seguimiento store');
        $seguimiento = new Seguimiento($request->all());
		$seguimiento -> parser($id);
        $seguimiento -> save();
    
        $bpos = array(Bpo::find($id));
        $seguimientos = Seguimiento::orderBy('id', 'DESC')
									-> proyectoactivo()
									-> proyectoId($id)
                                 	-> paginate();
        $notices = array('Seguimiento creado');
 		return \Redirect::route('bpo.proyectos.seguimientos',[$id])	->with('seguimientos','bpos', 'notices')
        															->with('notices',$notices);
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
    public function edit($idProy = 0, $idSeguimiento)
    {
        
		Log::info('BPO - Seguimiento - editar id: '.$idSeguimiento);
		$bpo = Bpo::find($idProy);
        $seguimientos = Seguimiento::findOrFail($idSeguimiento);;
		
		$notices = array('Seguimiento creado');
        return view('bpo.proyectos.seguimientos.editar', compact('bpo', 'seguimientos','notices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(SeguimientoRequest $request, $id,$seguimientoId)
    {
        //
        //dd($status);
		Log::info('BPO - Seguimiento actualizar id seguimiento : '.$seguimientoId);
		$seguimiento = Seguimiento::findOrFail($seguimientoId);
		Log::debug(print_r($request->all(),TRUE));
		$seguimiento->fill($request->all());
		$seguimiento -> parser($id);
		$seguimiento -> save();
		
		$bpos = array(Bpo::find($id));
        $seguimientos = Seguimiento::orderBy('id', 'DESC')
									-> proyectoactivo()
									-> proyectoId($id)
                                 	-> paginate();
        
		
		 $notices = array("Seguimiento Actualizado con ID $seguimientoId");
		
        
        return \Redirect::route('bpo.proyectos.seguimientos',[$id])	-> with('notices',$notices)
																	-> with('notices_tmp',"pruebas");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($idProyecto, $idSeguimiento)
    {
        //
        Log::info('BPO - Seguimiento destroy id seguimiento : '.$idSeguimiento);
        $seguimiento = Seguimiento::findOrFail($idSeguimiento);
		$seguimiento -> borradoLogico();
		$seguimiento -> save();
		Log::info('BPO - Seguimiento destroy Finalizado id seguimiento : '.$idSeguimiento);
		return \Redirect::route('bpo.proyectos.seguimientos',[$idProyecto])->with('seguimientos','bpos', 'notices');
		
    }
}
