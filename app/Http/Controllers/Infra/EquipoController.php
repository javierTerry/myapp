<?php

namespace App\Http\Controllers\Infra;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


use Log;
use App\Model\Infra\Equipo;
use App\Model\Infra\Rack;

class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        Log::info('EQUIPO index ');
        $equipos  = Equipo::orderBy('created_at', 'DESC')  
            -> paginate();

            
        return view('infra.equipo.index', compact('equipos') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        $racks  = Rack::all();
        #dd($racks);
        return view('infra.equipo.crear', compact('racks'));
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

            $item = new Equipo();
            #dd($request->all());
            $item -> hostname  = $request->get('hostname');
            $item -> ip  = $request->get('ip');
            $item -> serial  = $request->get('serial');
            $item -> responsable  = $request->get('responsable');
            $item -> id_rack = $request->get('id_rack');
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
