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
        Log::info(print_r("Iniciando storage ".dirname(__FILE__),TRUE));
		$backups = new Hbkp();
		
		$backups -> parser($request);
		
		
		dd(TRUE);
		
		
		$backups -> cliente = "test";
		$backups -> host = "test";
		$backups -> esquema = "test";
		$backups -> tipo = "test";
		$backups -> recurrente = "test";
		$backups -> nombre_log = "test";
		$backups -> estatus = "test";
		
		$backups -> save();
		dd($backups -> clave_area); 
		
		return "exito";
		
    	Log::info(print_r("Index",TRUE));
        $file = Input::file("file");
		$content =  file($file ->getRealPath());
		$matrizResplado = array();
		$key = "";
		foreach ( $content as $key => $value) {
			$value = str_replace(array("<tr><TH COLSPAN=6>"," </TH></tr>", "...................." ), "", $value);
			$value = trim($value);
			if (strlen($value) > 5){
				
				$values = explode("|", $value);	
				if (  (int)count($values) === 1 ) {
					$matrizKey = 	$values[0];
					continue;
				}
				$matrizResplado[$matrizKey][] = $values;
			}
		}//fin foreach
		Log::debug(print_r($matrizResplado,TRUE));
		Log::info(print_r("Finalizando storage ".__FILE__,TRUE));
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
