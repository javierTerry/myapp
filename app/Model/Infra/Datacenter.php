<?php

namespace App\Model\Infra;

use Illuminate\Database\Eloquent\Model;

class Datacenter extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'datacenter';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'descripcion'];
	#					, 'costo_proyecto', 'costo_real', 'fecha_inicial_real','fecha_final_real','status'
	#					];
	
	/**
	 * Parsed form fields to Object DATACENTER .
	 *
	 * @author Christian Hernandez <chhernandezs@kionetwork.com>
	 * 
	 * @param array Request
	 * 
	 */
	 
	public function parser($value = '')
	{
		Log::info('DATACENTER Parser');
		Log::debug(print_r($this -> attributes, true));
		$this -> fecha_inicial_planeada = \Carbon\Carbon::parse($this -> fecha_inicial_planeada);
		$this -> fecha_final_planeada	= \Carbon\Carbon::parse($this -> fecha_final_planeada);
		$this -> fecha_inicial_real = \Carbon\Carbon::parse($this -> fecha_inicial_real);
		$this -> fecha_final_real	 = \Carbon\Carbon::parse($this -> fecha_final_real);
		Log::info('DATACENTER Parser Finalizado');
	}

	/**
	 * Parsed form fields to Object BPO .
	 *
	 * @author Christian Hernandez <chhernandezs@masnegocio.com>
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
	 * Serch Names by strig, clause like  .
	 *
	 * @author Christian Hernandez <chhernandezs@kionetworks.com>
	 * 
	 * @param array Request
	 * 
	 */

	public function scopeNombre($query, $nombre)
	{
		if ( trim($nombre) != "")
		{
			$query->where('name', 'like', "%$nombre%");	
		}
		
	}
	
	/**
	 * Serch proyects by strig, clause like  .
	 *
	 * @author Christian Hernandez <chhernandezs@kionetworks.com>
	 * 
	 * @param array Request
	 * 
	 */
	public function scopeProyectoActivo($query)
	{
		$query->where('status', '=', 1);	
	
	}
}