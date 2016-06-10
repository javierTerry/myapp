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
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        //
        $bpos = array(Bpo::find($id));
        				//-> paginate();
        
        $seguimientos = Seguimiento::orderBy('created_at', 'DESC')
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

        $seguimientos = Seguimiento::orderBy('created_at', 'DESC')
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
        Log::info('BPO store');
        $seguimiento = new Seguimiento($request->all());
		$seguimiento -> parser();
        $seguimiento -> save();
    
        $bpos = array(Bpo::find($id));
        $seguimientos = Seguimiento::orderBy('created_at', 'DESC')
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
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
