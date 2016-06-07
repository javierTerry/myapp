<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Log;

class Bpo extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bpo';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','PROYECTO', 'CLIENTE', 'PROVEEDOR', 'fecha_inicial_planeada', 'fecha_final_planeada'
						, 'fecha_compra','costo_compra', 'costo_real', 'precio_venta', 'avance_real', 'fecha_inicial_real'
						,'fecha_final_real', 'avance_planeado', 'desviacion', 'periodo_reportado','status'
						];
	
	/**
	 * Parsed form fields to Object BPO .
	 *
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * 
	 * @param array Request
	 * 
	 */
	 
	public function parser($value = '')
	{
		Log::info('BPO Parser');
		Log::debug(print_r($this -> attributes, true));
		$this -> fecha_inicial_planeada = \Carbon\Carbon::parse($this -> fecha_inicial_planeada);
		$this -> fecha_final_planeada	= \Carbon\Carbon::parse($this -> fecha_final_planeada);
		$this -> fecha_compra 	= \Carbon\Carbon::parse($this -> fecha_compra);
		$this -> fecha_inicial_real = \Carbon\Carbon::parse($this -> fecha_inicial_real);
		$this -> fecha_final_real	 = \Carbon\Carbon::parse($this -> fecha_final_real);
		Log::info('BPO Parser Finalizado');
	}

	/**
	 * Parsed form fields to Object BPO .
	 *
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * 
	 * @param array Request
	 * 
	 */
	 
	public function borradoLogico()
	{
		Log::info('Asigando Borrado logico');
		$this -> status = 0;
		Log::info('Valor Asignado');
	}

	/**
	 * Serch proyects by strig, clause like  .
	 *
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * 
	 * @param array Request
	 * 
	 */
	public function scopeProyecto($query, $nombre)
	{
		if ( trim($nombre) != "")
		{
			$query->where('proyecto', 'like', "%$nombre%");	
		}
		
	}
	
	/**
	 * Serch proyects by strig, clause like  .
	 *
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * 
	 * @param array Request
	 * 
	 */
	public function scopeProyectoActivo($query)
	{
		$query->where('status', '=', 1);	
	
	}
}
