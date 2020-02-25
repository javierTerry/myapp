<?php

namespace App\Model\Infra;

use Illuminate\Database\Eloquent\Model;

class DatacenterView extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'dc_fase';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'name', 'desc', 'no_fase'];
	
	
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
