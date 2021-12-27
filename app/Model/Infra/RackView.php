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

	protected $table = 'rackView';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'coordenada', 'ur', 'name', 'no_equipo', 'dc' ];
	
	
	/**
	 * Serch proyects by strig, clause like  .
	 *
	 * @author Christian Hernandez <chhernandezs@kionetworks.com>
	 * 
	 * @param array Request
	 * 
	 */
	public function scopeName($query, $name)
	{
		if (trim($name) !=  "") {
			$query->where('name', 'like', "%$name%");
		}
	}
}
