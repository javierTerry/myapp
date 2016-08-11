<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input;
use Log;

use App\Model\HistoryBackup as Hbkp;

class HistoryBackupController extends Controller
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
    public function store(Request $request)
    {
    	try{
    		Log::info(print_r("Start store ".dirname(__FILE__),TRUE));
			$backups = new Hbkp();
			$file = Input::file("file");
			
			$backups -> analyzeFormat($file);
			
			try{
				foreach ($backups -> getMatrizRespaldos() as $key => $values) {
					foreach ($values as $value) {
							
							  Log::info(print_r($value,TRUE));
						$backups -> parser ($key, $value);
						Log::info(print_r("start save ".dirname(__FILE__),TRUE));
						$backups -> save();	
					 
					}
					
				}
			} catch (\Exception $e) {
				Log::debug(print_r("Store => ". dirname(__FILE__),TRUE));
			}
			
			
/*			
			$backups -> cliente = "test";
			$backups -> host = "test";
			$backups -> esquema = "test";
			$backups -> tipo = "test";
			$backups -> recurrente = "test";
			$backups -> nombre_log = "test";
			$backups -> estatus = "test";
		*/	
			//$backups -> save();
			//dd($backups -> clave_area); 
			
			
			Log::info(print_r("Finalizando storage ".__FILE__,TRUE));
			return "exito";	
    	} catch (\Exception $e) {
    		Log::info(print_r("Finalizando storage Error ".$e -> getMessage()." ".__FILE__,TRUE));
    		return "fallo";
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
