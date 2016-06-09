<?php

namespace App\Model\Bpo\Proyectos;

use Illuminate\Database\Eloquent\Model;

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
	protected $fillable = ['id'
						];
}
