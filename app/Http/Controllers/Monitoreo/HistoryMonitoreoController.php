<?php
namespace App\Http\Controllers\Monitoreo;

use App\Http\Controllers\Controller;

use Input;
use Log;

use App\Model\Monitoreo\Monitoreo as ModelMonitoreo;

class HistoryMonitoreoController extends Controller
{
    /**
     * PArsed File, get info backpus BD.
     *
     * @return Response
     */
     
    /**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//$this->middleware('auth');
	}
	
    public function index()
    {
    	
		dd("exito");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store()
    {
    	try{
            $i =0;
    		Log::info(print_r("Start store ".dirname(__FILE__),TRUE));
			$file = Input::file("file");
            $monitoreos = new ModelMonitoreo();
            $monitoreos -> analyzeFormat($file);


            foreach ($monitoreos -> matrizMonitores() as $sitio => $values) {
                         
                    foreach ($values as $key => $value) {
                        $monitor = new ModelMonitoreo();
                        $monitor -> parser ($sitio, $value);
                        Log::debug(print_r("start save ".$i++." ".dirname(__FILE__),TRUE));
                        $monitor -> save();  
                        unset($backup);
                    }
                    
                Log::info(print_r($sitio,TRUE));
            }//fin foreach
           
			Log::info(print_r("Finalizando storage ".__FILE__,TRUE));
			return "exito";	
    	} catch (\Exception $e) {
    		Log::info(print_r("Finalizando storage Error ".$e -> getMessage()." ".__FILE__,TRUE));
    		return "Fallo ".$e -> getMessage() ;
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
