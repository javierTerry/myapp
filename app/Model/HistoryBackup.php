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
	public function parser($client, $backupArray){
		
			Log::info(print_r("inicia parser",TRUE));
			
			$this -> cliente = $client;		
			$this -> host = $backupArray[0];
			$this -> esquema = $backupArray[1];
			$this -> tipo = $backupArray[2];
			$this -> recurrente = $backupArray[3];
			$this -> nombre_log = $backupArray[4];
			$this -> estatus = $backupArray[5];	

			
		Log::info(print_r("Finaliza parser",TRUE));

	}
	
	/**
	 * Parsed the data that get by file request
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
	 * @var file
	 * @param  Request  file
     * @return void
	 */
	public function analyzeFormat($file){
		Log::info(print_r("Start analyzeFormat",TRUE));
		$content =  file($file ->getRealPath());
		
		$matrizResplado = array();
		$key = "";
		
		$filesize = filesize($file);
		Log::debug(print_r($filesize,TRUE));
		
		if ($filesize < 5 ) 
			throw new \Exception("El tamaño del archivo es muy pequeño favor de validar");
		
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
		
		$this -> matrizRespaldos = $matrizResplado;
		Log::debug(print_r($matrizResplado,TRUE));
			
		Log::info(print_r("Finalize analyzeFormat",TRUE));
	}
	
	/**
	 * Parsed the data that get by file request
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
     * @return Array matrizRespaldos
	 */
	public function getMatrizRespaldos(){
		return $this -> matrizRespaldos;
	}
}
