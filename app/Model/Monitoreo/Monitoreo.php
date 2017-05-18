<?php namespace App\Model\Monitoreo;

use Illuminate\Database\Eloquent\Model;
use Log;

class Monitoreo extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'history_monitoreo';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','site', 'cliente', 'total', 'so', 'bd'
						, 'app_server', 'url', 'query','otro'];
	
	/**
	 * Parsed form fields to Object monitoreo .
	 *
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * 
	 * @param array Request
	 * 
	 */
	 
	public function parser($value = '')
	{
		Log::info('monitoreo Parser');
		Log::debug(print_r($this -> attributes, true));
		$this -> fecha_inicial_planeada = \Carbon\Carbon::parse($this -> fecha_inicial_planeada);
		$this -> fecha_final_planeada	= \Carbon\Carbon::parse($this -> fecha_final_planeada);
		$this -> fecha_inicial_real = \Carbon\Carbon::parse($this -> fecha_inicial_real);
		$this -> fecha_final_real	 = \Carbon\Carbon::parse($this -> fecha_final_real);
		Log::info('monitoreo Parser Finalizado');
	}

	/**
	 * Parsed form fields to Object monitoreo .
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
