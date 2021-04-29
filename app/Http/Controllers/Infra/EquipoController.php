<?php

namespace App\Http\Controllers\Infra;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Log;
use App\Model\Infra\Equipo;
use App\Model\Infra\EquipoView;
use App\Model\Infra\EquipoHistorial;
use App\Model\Infra\Rack;

use Carbon\Carbon;

class EquipoController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        Log::info('EQUIPO index ');
        $leyenda = "Activos";

        $equipos  = EquipoView::
                        where('inventario', 1)
                        ->get();
        return view('infra.equipo.index', compact('equipos', 'leyenda') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {

        $rack  = Rack::all();
        $equipo = new Equipo();
        return view('infra.equipo.crear', compact('rack', 'equipo'));
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
            Log::info('Equipo store');

            $item = new Equipo($request->all());
            $item -> alarmado =  is_null($item -> alarmado) ? 0 : $item -> alarmado;
            $item -> garantia =  Carbon::parse($item['garantia']);
            #dd( $item  );
            $item -> save();
            
            $notices = array("Carga exitosa");

            return \Redirect::route('infra.equipo.index') -> with ('notices',$notices);
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
        Log::info('Equipo show '.$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        Log::info("Equipo Controller edit ".$id);
        #\DB::enableQueryLog();
        $equipo = Equipo::find($id);
        
        $rack  = Rack::all();
        
        $equipoHisorial = EquipoHistorial::where('id_equipo','=',$id)
                        ->orderBy('id', 'desc')
                        ->get();
        #$quries = \DB::getQueryLog();        
        #dd($equipoHisorial);
        
        return view('infra.equipo.editar', compact('equipo', 'rack', 'equipoHisorial'));
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
        Log::debug('Equipo actualizar id: '.$id);
        
        $item = Equipo::findOrFail($id);
        $item -> fill($request->all());
        
        $item -> save();

        $tmp = sprintf("Actualizacion correcta de %s con id %d", $item -> hostname, $id);
        $notices = array($tmp);

        return \Redirect::route('infra.equipo.edit', ['equipo'=>$id]) -> with ('notices',$notices);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Equipo::findOrFail($id);
        $notices = array("Equipo ". $item -> hostname. " borrado");
        $item -> status = 0;
        $item->save();
        

        return \Redirect::route('infra.equipo.index') -> with ('notices',$notices);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function alarmado(Request $request)
    {
        Log::info('EQUIPO ALARMADO index ');
        $leyenda = "Alarmados";
        $btn_accion = 1;
        $equipos  = EquipoView::
                        where('alarmado', 1)
                        ->get();

        return view('infra.equipo.alarmado', compact('equipos', 'leyenda', 'btn_accion') );
    }



    /**
     * Display a listing of the resource.
     *
     * @return #equipos objeto del modelo EquipoView
     */
    public function inactivo()
    {
        Log::info('EQUIPO INACTIVO ');
        $leyenda = "Inactivos";
        $btn_accion = 1;
        $equipos  = EquipoView::
                        where('inventario', 2)
                        ->get();

        return view('infra.equipo.alarmado', compact('equipos', 'leyenda', 'btn_accion') );
    }

        /**
     * Display a listing of the resource.
     *
     * @return $equipos objeto del modelo EquipoView
     */
    public function historico()
    {
        Log::info('EQUIPO HISTORICO ');
        $btn_accion = 0;
        $equipos  = EquipoView::
                        where('inventario', 3)
                        ->get();

        $leyenda = "Historicos";

        return view('infra.equipo.alarmado', compact('equipos', 'leyenda', 'btn_accion' ) );
    }

}
