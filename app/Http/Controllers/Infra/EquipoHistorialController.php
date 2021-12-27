<?php

namespace App\Http\Controllers\Infra;

use Illuminate\Http\Request;
use App\Http\Requests\EquipoHistorialRequest;
use App\Http\Controllers\Controller;


use Log;
use Illuminate\Routing\Redirector;
use App\Model\Infra\EquipoHistorial;
use App\Model\Infra\Equipo;
use App\Model\Infra\Rack;

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
        dd("returno");
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
    public function store(EquipoHistorialRequest $request)
    {
        Log::info('EQUIPO HISTORICO ');
        Log::info('EquipoHistorial store');
        $request->session()->put('quotation', $request->input());
        $mensajes = array();
        try {

            $id  = $request->get('id_equipo');            
            $equipo = Equipo::find($id);
            $rack  = Rack::all();
            $equipoHisorial = EquipoHistorial::where('id_equipo','=',$id)
                            ->orderBy('id', 'desc')
                            ->get();

            if ($request->validator->fails()) {
                $notices = $request->validator->messages()->all();
                return \Redirect::route('infra.equipo.edit', ['equipo'=>$id]) -> with ('notices',$notices);
            } 

            $item = new EquipoHistorial($request->all());
            $item->fecha_reporte = \Carbon\Carbon::now();
            $item -> save();
            $mensajes[] = "Se agrego el seguimiento";
               
        } catch (Exception $exception) {
            Log::info('EquipoHistorial exception');
           return \Redirect::route('infra.equipo.edit', ['equipo'=>$id]) -> withErrors ($exception);
        }

        Log::info('EquipoHistorial Finalizando');
        return \Redirect::route('infra.equipo.edit', ['equipo'=>$id]) -> withSuccess ($mensajes);
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
