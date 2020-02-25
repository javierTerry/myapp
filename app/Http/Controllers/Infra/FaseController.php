<?php

namespace App\Http\Controllers\Infra;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Log;
use App\Model\Infra\Fase;
use App\Model\Infra\FaseView;
use App\Model\Infra\Datacenter;

class FaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request )
    {
        Log::info('Fase index ');
        $fases  = FaseView::name( $request -> get('name')) 
            -> orderBy('created_at', 'DESC')  
            -> paginate();

        return view('infra.fase.index', compact('fases') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        
        $dcs  = Datacenter::all();
        $fase = new Fase();

        return view('infra.fase.crear', compact('dcs', 'fase'));
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
            Log::info('Fase store');
              
            $item = new Fase($request->all());
            $item -> save();
            $notices = array("Carga exitosa");

            return \Redirect::route('infra.fase.index') -> with ('notices',$notices);
        } catch (Exception $e) {
            return \Redirect::route('infra.fase.index') -> withErrors ($e -> getMessage());   
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
        Log::debug("Fase Controller edit ".$id);
        $fase = Fase::find($id);
        $dcs  = Datacenter::all();
        return view('infra.fase.editar', compact('fase', 'dcs'));
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
        Log::debug('Fase actualizar id: '.$id);
        $item = Fase::findOrFail($id);
        $item -> fill($request->all());
        $item -> save();

        $notices = array("Actualizacion correcta de ".$item -> name);

        return \Redirect::route('infra.fase.index') -> with ('notices',$notices);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Fase::find($id);
        $notices = array("Fase ". $item -> name. " eliminado");
        $item->delete();
        

        return \Redirect::route('infra.fase.index') -> with ('notices',$notices);
    }
}
