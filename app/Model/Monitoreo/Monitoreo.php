<?php namespace App\Model\Monitoreo;

use Illuminate\Database\Eloquent\Model;
use Log;

class Monitoreo extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'history_monitores';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','site', 'cliente', 'total', 'so', 'bd'
						, 'app_server', 'url', 'query','otro'];


	/**
	 * Variable que contiene la matriz sitios vs monitores
	 *
	 * @var array
	 */
	 
	private $matrizMonitores = array();	

	/**
	 * Analiza que el archvio tenga un tamaño autorizado
	 * 
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * @var file
	 * @param  Request  file
     * @return void
	 */
	public function analyzeFormat($file){
		Log::info(print_r("Start analyzeFormat",TRUE));
		$content =  file($file ->getRealPath());
		$filesize = filesize($file);
		Log::debug(print_r($filesize,TRUE));
		
		if ($filesize < 50 ) 
			throw new \Exception("El tamaño del archivo es muy pequeño favor de validar");
		try{

			$this -> matriz($content);


			
		} catch (\Exception $e) {
			$msg = $e -> getMessage();
			Log::info(print_r($msg." ".__FILE__,TRUE));
            throw new \Exception($msg);
		}
		
		Log::info(print_r("Finalize analyzeFormat",TRUE));
		
	}


	/**
	 * Extrae os datos y los deja en un array asocciativo
	 * 
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * @param  Strings  $contenido
     * @return void
	 */
	protected function matriz($contenido){
		Log::info(print_r("Inicia Matriz",TRUE));
		$iniciador = true;
		$ignoreCabeceras = true;
		$count = 0;
		$sitio = "";
		
		
		foreach ($contenido as $key => $value){

			if ( $iniciador ){
				$tmp = explode(",", $value);	
				$sitio = trim($tmp[0]);
				$iniciador = false;
				$ignoreCabeceras = true;
				Log::debug(print_r(	"sitio ".$sitio,true));
				continue;
			}

			if ($ignoreCabeceras){
				Log::debug(print_r(	"Ignorando cabeceras",true));
				$ignoreCabeceras = false;
				continue;
			}
			
			$data = explode(",", $value);

			if (empty($data[0])){
				
				$count += 1;
				if ($count === 2){
					Log::debug(print_r(	"Ignorando Linea final del iniciador",true));
					$iniciador = true;
					$ignoreCabeceras = true;
					$count = 0;
					continue;
				}
				Log::debug(print_r(	"Ignorando totales",true));
				continue;	
			}

			$matrizMonitores[$sitio][] = $data;			
		}

		$this -> matrizMonitores = $matrizMonitores;

		Log::info(print_r("Termina Matriz",TRUE));

	} // fin matriz


	/**
	 * Parsed the data that get by request
	 * 
	 * @author Christian Hernandez <christian.hernandez@masnegociocom>
	 * @var array
	 * @param  
     * @return Response
	 */
	public function parser($sitio, $matriz){
		
		Log::info(print_r("inicia parser",TRUE));
		
		$this -> site = $sitio;		
		$this -> cliente = $matriz[0];
		$this -> total = $matriz[1];
		$this -> so = $matriz[2];
		$this -> bd = $matriz[3];
		$this -> app_server = $matriz[4];
		$this -> url = $matriz[5];	
		$this -> query = $matriz[6];
		$this -> otros = $matriz[7];	

			
		Log::info(print_r("Finaliza parser",TRUE));

	}



	/**
	 * get
	 * 
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
     * @return Array matrizRespaldos
	 */
	public function matrizMonitores(){
		return $this -> matrizMonitores;
	}
}
