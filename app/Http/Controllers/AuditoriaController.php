<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Log;
use Auth;


#Models que usara el flujo de trabajo
use App\Model\Auditoria\Cmdb;
use App\Model\Auditoria\Cmdb_reporte;
use App\Model\Infra\EquipoView;


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

        $items = Cmdb::orderby('id', 'desc')
                ->get();

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
        try {
            
        } catch (Exception $e) {
            
        }
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
            $item -> save();

            $dc  = $request->get('datacenter');
            $validacion = $request->get('validacion');
            $equipoTmp = EquipoView::where('dc', $dc)->get();
            
            $equipoPorcentaje = round((count($equipoTmp)*(int)($validacion))/100);
            
            $equipo = EquipoView::where('dc', $dc)
                        ->inRandomOrder()
                        ->limit($equipoPorcentaje)
                        ->get();
            
            #dd( (array)$equipo);
                        $i= 0;
            foreach ($equipo as $key => $value) {
                // code...
                #dd($value);
                $reporte = new Cmdb_reporte();
                $reporte -> estado = 1;
                $reporte -> datacenter = $dc;
                #$reporte -> fase = $value -> fase ;
                $reporte -> rack = $value -> rack;
                $reporte -> nombre = $value -> hostname;
                $reporte -> ns = $value -> serie;
                #$reporte ->  = $value -> ;
                #$reporte -> producto = $value -> ;
                $reporte -> modelo = $value -> modelo;
                $reporte -> propietarioNombre = $value -> soporte;
                $reporte -> propietarioContacto = $value -> soporte;
                $reporte -> idVisual = $value -> id;
                $reporte -> idCmdb = $item -> id ;

                $reporte -> save();
                
            }
            
            #dd($i);
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
        $tabla = Cmdb_reporte::where('idCmdb',$id)
                ->get();

        return view('auditorias.editar', compact('item','tabla'));
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
        $item = Cmdb::findOrFail($id);
        $item -> fill($request->all());
        $item -> save();

        $notices = array("Actualizacion correcta de ".$id);

        return \Redirect::route('auditoria.cmdb.index') -> with ('notices',$notices);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $item = Cmdb::findOrFail($id);
        $notices = array("Datacenter ". $item -> name. " borrado");
        $item->status = 0;
        $item->save();
        
        return \Redirect::route('auditoria.cmdb.index') -> with ('notices',$notices);
    }
}
