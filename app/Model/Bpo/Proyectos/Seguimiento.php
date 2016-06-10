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
	 
	public function parser($value = '')
	{
		Log::info('BPO-Seguimientos Parser');
		Log::debug(print_r($this -> attributes, true));
		$this -> fecha_de = \Carbon\Carbon::parse($this -> fecha_de);
		$this -> fecha_hasta	= \Carbon\Carbon::parse($this -> fecha_hasta);
		Log::info('BPO-Seguimientos Parser Finalizado');
	}
}
