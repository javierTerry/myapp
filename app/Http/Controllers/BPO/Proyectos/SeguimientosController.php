<?php

namespace App\Http\Controllers\BPO\Proyectos;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Log;
use App\Model\Bpo;
use App\Model\Bpo\Proyectos\Seguimiento;

class SeguimientosController extends Controller
{
	
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
     * Display a resource by Id.
     *
     * @return View bpo.proyectos.index
     */
    public function index($id)
    {
        //
        Log::info('Seguimiento index, id psproyecto'.$id);
        $bpos = array(Bpo::find($id));
        $seguimientos = Seguimiento::orderBy('id', 'DESC')
								-> proyectoactivo()
								-> proyectoId($id)
								-> paginate();
								 
		return view('bpo.proyectos.index', compact('bpos', 'seguimientos'));
       
        
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
    public function store(Request $request, $id)
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
        return view('bpo.proyectos.index', compact('bpos', 'seguimientos'));
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
    public function update(Request $request, $id,$seguimientoId, $status = 1)
    {
        //
        //dd($status);
		Log::info('BPO - Seguimiento actualizar id seguimiento : '.$id);
		$seguimiento = Seguimiento::findOrFail($seguimientoId);
		if($status === 1){
			$seguimiento = Seguimiento::findOrFail($seguimientoId);
			Log::debug(print_r($request->all(),TRUE));
			$seguimiento->fill($request->all());
			$seguimiento -> parser($id);
				
		} else {
			$seguimiento -> borradoLogico();
		}
		$seguimiento -> save();
		
		
		$bpos = array(Bpo::find($id));
        $seguimientos = Seguimiento::orderBy('id', 'DESC')
									-> proyectoactivo()
									-> proyectoId($id)
                                 	-> paginate();
        $notices = array("Seguimiento Eliminado");
		
        return view('bpo.proyectos.index', compact('bpos', 'seguimientos', 'notices'));
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
    }
}
