<?php

namespace App\Model\Bpo\Proyectos;

use Illuminate\Database\Eloquent\Model;

use Log;

class Seguimiento extends Model
{
    //
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bpo_seguimientos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'avance_planeado', 'avance_real', 'desviacion', 'fecha_de', 'fecha_hasta','observaciones','bpo_proyecto_id'];
	
	/**
	 * Parsed form fields to Object BPO .
	 *
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * 
	 * @param array Request
	 * 
	 */
	 
	public function parser($proyectoId = '')
	{
		Log::info('BPO-Seguimientos Parser');
		Log::debug(print_r($this -> attributes, true));
		$this -> fecha_de = \Carbon\Carbon::parse($this -> fecha_de);
		$this -> fecha_hasta	= \Carbon\Carbon::parse($this -> fecha_hasta);
		$this -> bpo_proyecto_id = $proyectoId;
		Log::info('BPO-Seguimientos Parser Finalizado');
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
	public function scopeProyectoActivo($query)
	{
		$query->where('status', '=', 1);	
	
	}
	
	/**
	 * Serch proyects by bpo_proyecto_id, clause where  .
	 *
	 * @author Christian Hernandez <christian.hernandez@masnegocio.com>
	 * 
	 * @param array Request
	 * 
	 */
	public function scopeProyectoId($query, $proyectoId = 0)
	{
		$query->where('bpo_proyecto_id', '=', $proyectoId);	
	
	}
}
