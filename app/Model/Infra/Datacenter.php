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
	protected $fillable = ['id','name', 'desc'];
	#					
	

}