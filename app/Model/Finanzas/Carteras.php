<?php namespace App\Model\Finanzas;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model\Finanzas;
use Illuminate\Http\Request;
use Log;
use File;
use Exception;

class Carteras extends Model
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
	protected $table = 'finanzas_cartera';
	
	/**
	 * Variable that content data information 
	 *
	 * @var string
	 */
	 
	private $contenido = array();

	/**
	 * 
	 *
	 * @var array
	 */
	 
	private $matriz = array();

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
     * @return void
	 */
	public function contenido($request){
		Log::info(print_r("inicia contenido",TRUE));
		try {
		    $this -> contenido = file($request->file('archivo')->getrealpath());
		} catch (\Illuminate\Contracts\Filesystem\FileNotFoundException $exception){
			Log::info(' FileNotFoundException');
			throw new Exception("FileNotFoundException", 1);
		    //die("The file doesn't exist");
		   //die("The file doesn't exist");
		}
		
		
		Log::info(print_r("Finaliza contenido",TRUE));

	}


	/**
	 * El contenido se almacena en un array
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
	 * @param  contenido valor que contiene los datos del archivo
     * @var $key indice del renglon 
     * @var $value contenido del renglon
     * @var $tmp array con los valores separaod por comas del contenido  
     * @return void
	 */
	public function guardar(){
		Log::info(print_r("inicia guardar",TRUE));
		foreach ($this -> contenido as $key => $value) {
			try{
				if (!$key)
					continue;
					
				$tmp = explode(",", $value);
				//Log::info(print_r($tmp,TRUE));
				$carteras = new Carteras();
				$carteras -> id_cliente = $tmp[0];
				$carteras -> cliente = $tmp[1];
				$carteras -> antiguedad = $tmp[2];		
				$carteras -> fecha = \Carbon\Carbon::parse($tmp[3]);
				$carteras -> importe_moneda_local = $tmp[4];
				$carteras -> tipo_moneda = $tmp[5];
				$carteras -> texto = $tmp[6];
				$carteras -> importe_moneda_doc = $tmp[7];
				$carteras -> tipo_moneda_doc = $tmp[8];
				$carteras -> referencia = $tmp[9];
				$carteras -> referencia_factura = $tmp[10];
				$carteras -> save();
	
			} catch (Exception $e){
				Log::info(print_r($e -> getMessage(),TRUE));
			}
		}
		
		
		Log::info(print_r("Finaliza guardar",TRUE));

	}

}
