<?php

namespace App\Http\Controllers\Infra;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Log;
use App\Model\Infra\Rack;
use App\Model\Infra\RackView;

class RackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        Log::info('RACK index ');
        $racks  = RackView::orderBy('created_at', 'DESC')  
            -> paginate();


        return view('infra.rack.index', compact('racks') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $fases = Rack::joinDcFase();
        
        return view('infra.rack.crear' , compact('fases'));
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
            Log::info('rack store');

            $item = new Rack($request->all());
            $item -> save();
            
            $notices = array("Carga exitosa");

            return \Redirect::route('infra.rack.index') -> with ('notices',$notices);
        } catch (Exception $e) {
            return \Redirect::route('infra.rack.index') -> withErrors ($e -> getMessage());   
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
        Log::debug("Rack Controller edit ".$id);
        $rack = Rack::find($id);
        $fase  = Fase::all();
        return view('infra.fase.editar', compact('rack', 'fase'));
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
        Log::debug('Rack actualizar id: '.$id);
        $item = Rack::findOrFail($id);
        $item -> fill($request->all());
        $item -> save();

        $notices = array("Actualizacion correcta de ".$item -> name);

        return \Redirect::route('infra.rack.index') -> with ('notices',$notices);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Rack::find($id);
        $notices = array("Rack ". $item -> name. " eliminado");
        $item->delete();
        

        return \Redirect::route('infra.rack.index') -> with ('notices',$notices);
    }
}
