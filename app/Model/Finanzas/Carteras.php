<?php namespace App\Model\Finanzas;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model\Finanzas;
use Illuminate\Http\Request;

use File;
use Exception;
use \Carbon\Carbon;
use DB;
use Log;
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
	 * @var strin
	 */
	 
	private $contenido = array();

	/**
	 * 
	 *
	 * @var array
	 */
	 
	private $cartera_periodo = 0;

	/**
	 * 
	 *
	 * @var array
	 */
	 
	private $periodos = array('corriente' => "", 'atreinta' => "", 'asesenta' => "", 'anoventa' => "") ;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','id_cliente'];
	
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
			Log::info('FileNotFoundException');
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
		//Log::info();
		$carterasPeriodo = Carbon::now()-> year."".Carbon::now()-> month."".Carbon::now()-> day;

		foreach ($this -> contenido as $key => $value) {
			try{
				if (!$key)
					continue;
				$tmp = array();
				$tmp = explode(",", $value);
				
				$carteras = new Carteras();
				$carteras -> id_cliente = $tmp[0];
				$carteras -> cliente = $tmp[1];
				$carteras -> antiguedad = $tmp[3];		
				$carteras -> fecha = Carbon::parse($tmp[2]);
				$carteras -> importe_moneda_local = $tmp[4];
				$carteras -> tipo_moneda = $tmp[5];
				$carteras -> texto = $tmp[6];
				$carteras -> importe_moneda_doc = $tmp[7];
				$carteras -> tipo_moneda_doc = $tmp[8];
				$carteras -> referencia = $tmp[9];
				$carteras -> referencia_factura = $tmp[10];
				$carteras -> finanzas_cartera = $carterasPeriodo;
				$carteras -> save();
				
				
			} catch (Exception $e){
				Log::info(print_r($e -> getMessage(),TRUE));
			}
		}
		Log::info(print_r("Finaliza guardar",TRUE));

	}

	/**
	 * Procesa una cartera y generar los rubros al corriente, 30, 60 o 90 días
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
	 * @param  int - cartera_periodo. Valor del periodo que se va a procesar
     * @var 
     * @var 
     * @var   
     * @return void
	 */
	public function procesa($cartera_periodo){
		$startTime = Carbon::now();
		log::info($startTime);
		$this -> cartera_periodo = $cartera_periodo;
		Log::info("Inicia procesa cartera_periodo = ".$cartera_periodo);

		$rows = DB::select('select * from view_finanzas_cartera;');
		$clientes = $this -> agruparPorCliente($rows);
		$seguimientos = $this -> calcularPeriodo($clientes);
		#die();
		
		$finishTime = Carbon::now();
		log::info($finishTime->diffForHumans($startTime));
		Log::info(print_r("Finaliza procesa cartera_periodo = ".$cartera_periodo,TRUE));
		return $seguimientos;
	}


	/**
	 * Separa la data por cliente
	 * 
	 * @author 	Christian Hernandez <javierv31@gmail.com>
	 * @param  	array - $datas . resultset de la consulta
     * @var 	array - clientes Matriz que agrupara los clientes 
     * @var 	value - registro obtenido del datas
     * @var   
     * @return void
	 */
	protected function agruparPorCliente( $rows ) {
		Log::info("Inicia agruparPorCliente cartera_periodo = ".$this -> cartera_periodo);
		$clientes = array();
		foreach ($rows as $value) {
			$clientes[$value -> id_cliente][] = $value;
			#$clientes = array_combine((array)$value, (array)$value);
		}
		Log::info(print_r("Finaliza agruparPorCliente cartera_periodo = ".$this -> cartera_periodo,TRUE));
		
		Log::debug(print_r($clientes,true));
		return $clientes;
	}


	/**
	 * Separa la data por cliente
	 * 
	 * @author 	Christian Hernandez <javierv31@gmail.com>
	 * @param  	array - $datas . resultset de la consulta
     * @var 	array - clientes Matriz que agrupara los clientes 
     * @var 	value - registro obtenido del datas
     * @var   
     * @return void
	 */
	protected function calcularPeriodo( $clientes ) {
		Log::info("Inicia agruparPorCliente cartera_periodo = ".$this -> cartera_periodo);
		$clientePeriodo = array();
		foreach ($clientes as $key => $cliente) {
			$periodos = array( 'alcorriente' => "0.0", 'atreinta' => "0.0", 'asesenta' => "0.0", 'anoventa' => "0.0") ;
			$tmp = array();
			foreach ($cliente as $key1 => $value) {
				$tmp =  $value;
				
				switch($value -> cartera_vencida) {
				    case ($value -> cartera_vencida === 'alcorriente'):
				    	Log::debug("corriente 1");
				    	$periodos['alcorriente'] = $value -> alcorriente  ;
				    break;
				    case ($value -> cartera_vencida === 'atreinta'):
				    	Log::debug("atreinta 1");
				    	$periodos['atreinta'] = $value -> atreinta;
				    break;
				    case ($value -> cartera_vencida === 'asesenta'):
				    	Log::debug("asesenta 1");
				    	$periodos['asesenta'] = $value -> asesenta;
				    break;
				    case ( $value -> cartera_vencida === 'anoventa' ):
				    	Log::debug("anoventa 1"); 
				    	$periodos['anoventa'] = $value -> anoventa;
				    break;

				}

			}
			
			$tmp -> cartera_vencida = $periodos ;	
			$clientePeriodo[$key] = $tmp;
		}
		return $clientePeriodo; 
	}
}
