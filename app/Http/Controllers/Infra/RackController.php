<?php

namespace App\Http\Controllers\Infra;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Log;
use App\Model\Infra\Rack;

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
        $racks  = Rack::orderBy('created_at', 'DESC')  
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
        //
        return view('infra.rack.crear');
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

            $dc = new Rack();
            #dd($request->all());
            $dc -> name  = $request->get('name');
            $dc -> ur  = $request->get('ur');
            $dc -> coordenada  = $request->get('coordenada');
            
            $dc -> save();
            
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
