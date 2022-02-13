<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;

#Models que usara el flujo de trabajo
use App\Model\Auditoria\Cmdb;
use Socialite;
use Auth;
use Exception;


class AuditoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        Log::info('DATACENTER index ');

        $items = Cmdb::all();
        
        return view('auditorias.index', compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('auditorias.cmdb.crear');   
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
            Log::info(__FILE__.' store');
            
            $item = new Cmdb($request->all());
            $item -> responsable  = Auth::user()->email;
            //$dc -> desc  = $request->get('desc');
            #dd(Auth::user()->email);
            $item -> save();
            
            $notices = array("Registro de auditoria exitoso con ID ".$item -> id);

            return \Redirect::route('auditoria.cmdb.index') -> with ('notices',$notices);
        } catch (Exception $e) {
            return \Redirect::route('auditoria.cmdb.index') -> withErrors ($e -> getMessage());   
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
        Log::debug("Datacenter Controller edit ".$id);

        $item = Cmdb::find($id);

        return view('auditorias.editar', compact('item'));
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
        Log::debug('Datacenter actualizar id: '.$id);
        $item = Datacenter::findOrFail($id);
        $item -> fill($request->all());
        $item -> save();

        $notices = array("Actualizacion correcta de ".$item -> name);

        return \Redirect::route('infra.dcs.index') -> with ('notices',$notices);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Datacenter::findOrFail($id);
        $notices = array("Datacenter ". $item -> name. " borrado");
        $item->status = 0;
        $item->save();
        

        return \Redirect::route('infra.dcs.index') -> with ('notices',$notices);
    }
}
