<?php

namespace App\Http\Controllers\Infra;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Log;
use App\Model\Infra\Datacenter;
use App\Model\Infra\DatacenterView;


class DataCenterController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {

        Log::info('DATACENTER index ');
        $dcs = DatacenterView::all();
        
        return view('infra.datacenter.index', compact('dcs'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
        return view('infra.datacenter.crear');
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
            Log::info('Datacenter store');

            $dc = new Datacenter();
            $dc -> name  = $request->get('name');
            $dc -> desc  = $request->get('desc');
            
            $dc -> save();
            
            $notices = array("Carga exitosa ".$dc -> name);

            return \Redirect::route('infra.dcs.index') -> with ('notices',$notices);
        } catch (Exception $e) {
            return \Redirect::route('infra.dcs.index') -> withErrors ($e -> getMessage());   
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

        $dc = Datacenter::find($id);

        return view('infra.datacenter.editar', compact('dc'));
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
