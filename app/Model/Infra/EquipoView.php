<?php

namespace App\Model\Infra;

use Illuminate\Database\Eloquent\Model;

class EquipoView extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'equipoView';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'hostname', 'iphw', 'modelo','serie', 'soporte', 'dc', 'rack','marca', 'fase'];
}
