<?php

namespace App\Model\Infra;

use Illuminate\Database\Eloquent\Model;

use Log;

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
	
	
}
