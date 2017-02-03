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
			$file = null;
            $file = Input::file("file");
            $type = array_reverse(explode('/',$request->url()))[0];
            $backups -> analyzeFormat($file, $type);
            Log::debug(print_r($type,TRUE));

			try{
				foreach ($backups -> getMatrizRespaldos() as $nameCliet => $values) {
					
                    Log::info(print_r($values,TRUE));
                    foreach ($values as $key => $value) {
                        $backup = new Hbkp();
						$backup -> parser ($nameCliet, $value);
						Log::info(print_r("start save ".dirname(__FILE__),TRUE));
						$backup -> save();	
					 	unset($backup);
					}
					
				}
			} catch (\Exception $e) {
				Log::debug(print_r("Store => ". $e -> getMessage()." ". dirname(__FILE__),TRUE));
			}
			
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
