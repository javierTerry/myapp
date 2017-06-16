<?php namespace App\Model\Finanzas;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Model\Finanzas;
use Illuminate\Http\Request;
use Log;
use File;
use Exception;
use \Carbon\Carbon;
use DB;
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
		$this -> cartera_periodo = $cartera_periodo;
		Log::info("Inicia procesa cartera_periodo = ".$cartera_periodo);

		$rows = DB::select('select * from view_finanzas_cartera;');
		Log::debug(print_r($rows,true));
		die();

		$startTime = Carbon::now();
		
		log::info($startTime);
		$datas = $this::where('finanzas_cartera', '=', trim($cartera_periodo)) ->get();
		
		$clientes = $this -> agruparPorCliente($datas);
		$this -> calcularPeriodo($clientes);
		$finishTime = Carbon::now();
		log::info($finishTime->diffForHumans($startTime));
		return 	$this -> calcularPeriodo($clientes);
		Log::info(print_r("Finaliza procesa cartera_periodo = ".$cartera_periodo,TRUE));

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
	protected function agruparPorCliente( $datas ) {
		Log::info("Inicia agruparPorCliente cartera_periodo = ".$this -> cartera_periodo);
		$clientes = array();
		foreach ($datas as $value) {
			$clientes[$value -> id_cliente][] = json_decode($value);
		}
		Log::info(print_r("Finaliza agruparPorCliente cartera_periodo = ".$this -> cartera_periodo,TRUE));
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
			$periodos = array( 'cliente' => "",'corriente' => "", 'atreinta' => "", 'asesenta' => "", 'anoventa' => "") ;
			
			Log::info($key);
			foreach ($cliente as $key1 => $value) {
				# code...
				#Log::info(print_r($value,true));
				$periodos['cliente'] =  $value -> cliente;
				$origen = Carbon::parse($value -> fecha);
				$valor = $origen -> diffInDays(Carbon::now());
				switch($valor) {
				    case ($valor < 31):
				    	$periodos['coriente'][] = $value;
				    break;
				    case (($valor >= 31) && ($valor <= 60)):
				    	$periodos['atreinta'][] = $value;
				    break;
				    case (($valor >= 61) && ($valor <= 90)):
				    	$periodos['asesenta'][] = $value;
				    break;
				    case ($valor > 91):
				    	$periodos['anoventa'][] = $value; 
				    break;

				}
				$clientePeriodo[$key] = $periodos;
			}
		}
		Log::debug(print_r($clientePeriodo,true));
		return $clientePeriodo;
		Log::info(print_r("Finaliza agruparPorCliente cartera_periodo = ".$this -> cartera_periodo,TRUE));
	}

}
