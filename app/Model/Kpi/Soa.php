<?php namespace App\Model\Kpi;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Log;
use Input;
use \Exception;
use Illuminate\Database\QueryException;
use PDOException;


class Soa extends Model
{
	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $MSG_100 = "No existe caso para parsear " ;

	/**
	 * Variable usada para almacenar el contenedio del archivo.
	 *
	 * @var string
	 */
	protected $contenido = "" ;

    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'kpi_soa';
	
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
	 * Realiza un scope por tipo de BD
	 * 
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * @var array
	 * @param  
     * @return Response
	 */
	 public function scopeTipoBD($query)
    {
        return $query->where('tipo_bd', 'sqlserver') -> groupBy('fecha');
    }



	/**
	 * Parsed the data that get by request
	 * 
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * @var 
	 * @param  contenedor Contenedor de Input o Request
     * @return file
	 */
	public function guardarContenido($data){
		
		Log::info(print_r("Iniciando cargarContenido",TRUE));		
		try{
			Log::debug(print_r("tamano del archiov ".count($data ->file('archivo')) ,true));
	        $ignoreHeader = true;
	        $file = (count($data ->file('archivo'))) ? $data->file('archivo') : Input::file("file");
	        $fileName = $file -> getClientOriginalName();
	        Log::debug(print_r("Nombre File ".$fileName,true));
	        $this -> checkNameFile($fileName);
			$contenido = file($file ->getRealPath());
			foreach ($contenido as $key => $value) {
				# code...
				if ($ignoreHeader){
					$ignoreHeader = false;
					continue;
				}
				Log::debug($value);
				$this -> guardar($value,$fileName);

			}

		} catch (Exception $e ){
			Log::debug("Exception ".$e -> getMessage() );

		}
		
		Log::info(print_r("Finalizando cargarContenido",TRUE));
		#return $file;

	}//fin guardarContenido


	/**
	 * Parsed the data that get by request
	 * 
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * @var 	tmp Almacenara un explode de row para poder parsear
	 * @param  row Linea del archivo 
     * @return file
	 */
	protected function guardar($row, $fileName){
		
		Log::info(print_r("Iniciando guardar",TRUE));		
		try{
			
				
				$tmp = explode(",", $row);
				$fecha = explode("-", $fileName); 
				Log::debug(print_r($tmp,true));
				$soa = new Soa();
				$soa -> cliente = $tmp[0];
				$soa -> ambiente = $tmp[1];
				$soa -> ip = $tmp[2];
				$soa -> hostname = $tmp[3];
				$soa -> dominio = $tmp[4];
				$soa -> tam_dominio = $tmp[5];
				$soa -> fsar = $tmp[6];
				$soa -> fsdr = $tmp[7];
				$soa -> tam_tar = $tmp[8];
				$soa -> periodo = $tmp[9];
				$soa -> estatus_respaldo = trim($tmp[10]);
				$soa -> nombre_file = $fileName;
				$soa -> fecha_file = $this -> fecha_file ; #trim($fecha[1]);
				
				$soa -> save();
			
		} catch (QueryException $e ){
			Log::debug("QueryException ". $e -> getMessage() );
		}
		
		Log::info(print_r("Finalizando guardar",TRUE));
		#return $file;

	}


	/**
	 * Valida el nombre del archivo
	 * 
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * @var 	tmp Almacenara un explode de row para poder parsear
	 * @param  row Linea del archivo 
     * @return void
	 */
	protected function checkNameFile($fileName){
		
		Log::debug(print_r("Iniciando checkNameFile",TRUE));
		$fecha = explode("-", $fileName); 

		if (count($fecha) != 2)
			throw new Exception("El nombre del archivo no cumple el estandar", 1);
		if (is_integer(trim($fecha[1])))
			throw new Exception("El nombre del archivo no cumple el estandar", 1);
			
		$this -> fecha_file = trim($fecha[1]);
		
		Log::debug(print_r("Finalizando checkNameFile",TRUE));
		#return $file;

	}



}
