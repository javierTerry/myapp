<?php

namespace App\Http\Controllers\Infra;

use Illuminate\Http\Request;

#use App\Http\Requests;
use App\Http\Controllers\Controller;

use Log;
use App\Model\Infra\Datacenter;


class DataCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
        Log::info('DATACENTER index ');
        $urlupload = 'fnz.carteras.store';
        $dcs  = Datacenter::orderBy('created_at', 'DESC')  
            -> paginate();

        return view('infra.datacenter.index', compact('dcs', 'urlupload', 'dcs'));

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
            
            $notices = array("Carga exitosa");

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
