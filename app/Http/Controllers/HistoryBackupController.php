<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Input;
use Log;


class HistoryBackupController extends Controller
{
    /**
     * PArsed File, get info backpus BD.
     *
     * @return Response
     */
    public function index()
    {
    	Log::info(print_r("",TRUE));
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
        //
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
