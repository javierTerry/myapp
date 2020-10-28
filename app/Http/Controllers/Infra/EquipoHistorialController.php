<?php

namespace App\Http\Controllers\Infra;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Log;
use App\Model\Infra\EquipoHistorial;

class EquipoHistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        try{
            Log::info('EquipoHistorial store');
            
            $item = new EquipoHistorial($request->all());
            $item->fecha_reporte = \Carbon\Carbon::now();
            #dd($item);
            $idEquipo = $item->id_equipo;
            $item -> save();
            
            $notices = array("Se agrego el seguimiento ");

            return \Redirect::route('infra.equipo.edit', ['id'=>$idEquipo]) -> with ('notices',$notices);
        } catch (Exception $e) {
            return \Redirect::route('infra.equipo.index') -> withErrors ($e -> getMessage());   
        }
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
