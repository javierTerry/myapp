<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Log;

class HistoryBackup extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $MSG_100 = "No existe caso para parsear " ;

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'history_backups';
	
	/**
	 * Variable that content information of backups
	 *
	 * @var array
	 */
	 
	private $matrizRespaldos = array();

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [];
	
	/**
	 * Parsed the data that get by request
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
	 * @var array
	 * @param  
     * @return Response
	 */
	public function parser($client, $backupArray,$type_db,$dateFromFileName){
		
		Log::info(print_r("inicia parser",TRUE));
		
		$this -> cliente = $client;		
		$this -> host = $backupArray[0];
		$this -> esquema = $backupArray[1];
		$this -> tipo = $backupArray[2];
		$this -> recurrente = $backupArray[3];
		$this -> nombre_log = $backupArray[4];
		$this -> estatus = $backupArray[5];	
		$this -> tipo_bd = $type_db;
		$this -> fecha = $dateFromFileName;	

			
		Log::info(print_r("Finaliza parser",TRUE));

	}
	
	/**
	 * Parsed the data that get by file request by several areas
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
	 * @var file
	 * @param  Request  file
     * @return void
	 */
	public function analyzeFormat($file, $type){
		Log::info(print_r("Start analyzeFormat",TRUE));
		$content =  file($file ->getRealPath());
		$key = "";
		$filesize = filesize($file);
		Log::debug(print_r($filesize,TRUE));
		
		if ($filesize < 5 ) 
			throw new \Exception("El tamaño del archivo es muy pequeño favor de validar");
		try{
			switch ($type) {
				case 'oracle':
					$this -> matrizOracle($content);
					break;
				case 'oracleps':
					$this -> matrizDB($content);
					break;
				case 'sqlserver':
					$this -> matrizSqlserver($content);
					break;
				
				default:
					Log::info(print_r($this -> MSG_100,TRUE));
					throw new \Exception($this -> MSG_100);
					break;
			}
		} catch (\Exception $e) {
			$msg = $e -> getMessage();
			Log::info(print_r($msg." ".__FILE__,TRUE));
            throw new \Exception($msg);
		}
		
		Log::info(print_r("Finalize analyzeFormat",TRUE));
		
	}

	/**
	 * Parsed the data that get by file request
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
     * @param  $content 
	 */
	protected function matrizOracle($content){
		Log::info(print_r("Start matrizOracle",TRUE));
		$matrizResplado = array();
		foreach ( $content as $key => $value) {
			$value = trim($value);
			$verificador = substr_count($value,"|");
			Log::debug(print_r($verificador,TRUE));
			if( 6 != $verificador)
				continue;
			$values = explode("|", $value);	
			$matrizKey = $values[6];
			unset($values[6]);
			Log::debug(print_r($values,TRUE));
			$matrizResplado[$matrizKey][] = $values;
		
		}//fin foreach
		$this -> matrizRespaldos = $matrizResplado;
		Log::debug(print_r($this -> matrizRespaldos,TRUE));
		Log::info(print_r("end matrizOracle",TRUE));
	}//matrizOracle

	/**
	 * Parsed the data that get by file request
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
     * @param  $content 
	 */
	protected function matrizDB($content){
		Log::info(print_r("Start matrizDB",TRUE));

		$matrizResplado = array();
		$matrizKey = array();
		foreach ( $content as $key => $value) {
			$value = trim($value);
			$verificador = substr_count($value,"|");
			Log::debug(print_r("verificador 7 = ".$verificador,TRUE));	

			$value = trim($value);
			if (strlen($value) === 7)
				throw new \Exception("El formato no coincide con la estructura");

			$values = explode("|", $value);	
			$matrizKey = $values[0];
			unset($values[0]);
			unset($values[3]);
			$matrizResplado[$matrizKey][] = array_values($values);

			
		}//fin foreach
		$this -> matrizRespaldos = $matrizResplado;
		Log::debug(print_r($this -> matrizRespaldos,TRUE));
		Log::info(print_r("end matrizDB",TRUE));

	}//matrizDB

	/**
	 * Parsed the data that get by file request
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
     * @param  $content 
	 */
	protected function matrizSqlserver($content){
		Log::info(print_r("Start matrizSqlserver",TRUE));
		#Log::debug(print_r($content,TRUE));
		$ignoreLineZero = false;
		$matrizRespaldo = array();
		$cliente = "";
		$host = "" ;
		$values = array();
		foreach ( $content as $key => $value) {
			
			if ( !$ignoreLineZero ){
				$ignoreLineZero = true;	
				continue;
			}
				
			Log::debug(print_r(strlen($value),true));

			if ( strlen($value) < 30)
				continue;
			
			if ( (string)strripos($value,"instancia:") === "0"){
				$lineInstance = explode(":", $value);

				$host =  "";
				$lineInstancevalue = explode("_", $lineInstance[1]);
				$host 	= $lineInstancevalue[1];
				$cliente = trim($lineInstance[2]);
				continue;
			}

			Log::debug(print_r(explode(",",$value),true));

			$tmp = explode(",",$value);
			$values[0]= $host;
			$values[1] =  $tmp[0];
			$values[2] = $tmp[1];
			$values[3] = $tmp[7];
			$values[4] = trim($tmp[9]);
			$values[5] = $tmp[10];

			$matrizRespaldo[$cliente][] = $values;
			}//fin foreach

		
		$this -> matrizRespaldos = $matrizRespaldo;
		log::debug(print_r($this -> matrizRespaldos,TRUE));
		Log::info(print_r("end matrizSqlserver",TRUE));
		
	}//matrizOracle

	/**
	 * Parsed the data that get by file request
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
     * @return Array matrizRespaldos
	 */
	public function getMatrizRespaldos(){
		return $this -> matrizRespaldos;
	}

	/**
	 * Parsed the data that get by file request
	 * 
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
     * @return String date from file name
	 */
	public function getDateFromFile($type,$nameFile){
		$dateFromFileName = '19991201';
		switch ($type) {
			case 'oracle':
				$dateFromFileName = str_replace(".txt", "", array_reverse(explode('_', $nameFile))[0]);
				break;
			case 'uploads':
				$dateFromFileName = str_replace(".txt", "", array_reverse(explode('_', $nameFile))[0]);
				break;
			case 'sqlserver':
				$dateFromFileName = str_replace(".csv", "", array_reverse(explode('_', $nameFile))[0]);
				break;
			
			default:
				Log::info(print_r("DateFromFile - No existe caso  para ".$type,TRUE));
				break;
		}
		return $dateFromFileName ;
	}
}
