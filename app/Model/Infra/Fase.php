<?php

namespace App\Model\Infra;

use Illuminate\Database\Eloquent\Model;

class Fase extends Model
{
    //
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'fase';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'name', 'desc', 'id_datacenter'];
	
	
	/**
	 * Parsed form fields to Object Fase .
	 *
	 * @author Christian Hernandez <chhernandezs@kionetwork.com>
	 * 
	 * @param array Request
	 * 
	 */


}
