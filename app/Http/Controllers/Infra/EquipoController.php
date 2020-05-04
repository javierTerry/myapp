<?php

namespace App\Http\Controllers\Infra;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Log;
use App\Model\Infra\Equipo;
use App\Model\Infra\EquipoHistorial;
use App\Model\Infra\Rack;

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
        $equipos  = Equipo::hostname( $request -> get('hostname')) ->get();

        return view('infra.equipo.index', compact('equipos') );
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
            #dd();
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        Log::debug("Equipo Controller edit ".$id);
        \DB::enableQueryLog();
        $equipo = Equipo::find($id);
        
        $rack  = Rack::all();
        
        $equipoHisorial = EquipoHistorial::idEquipo($id)
                        ->get();

        $quries = \DB::getQueryLog();        
        #dd($quries);
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
        
        #dd($request->all());
        $item = Equipo::findOrFail($id);
        $item -> fill($request->all());
        
        $item -> save();

        $tmp = sprintf("Actualizacion correcta de %s con id %d", $item -> hostname, $id);
        $notices = array($tmp);

        return \Redirect::route('infra.equipo.edit', ['id'=>$id]) -> with ('notices',$notices);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Equipo::find($id);
        $notices = array("Equipo ". $item -> hostname. " eliminado");
        $item->delete();
        

        return \Redirect::route('infra.equipo.index') -> with ('notices',$notices);
    }

}
