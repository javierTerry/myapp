<?php

namespace App\Model\Infra;

use Illuminate\Database\Eloquent\Model;

class RackView extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'rack_equipo';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'coordenada', 'ur', 'name', 'no_equipo' ];
	
	
	/**
	 * Parsed form fields to Object DATACENTER .
	 *
	 * @author Christian Hernandez <chhernandezs@kionetwork.com>
	 * 
	 * @param array Request
	 * 
	 */
}
