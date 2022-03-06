<?php

namespace App\Model\Auditoria;

use Illuminate\Database\Eloquent\Model;

class Cmdb extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'aud_cmdb';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','estado', 'fecha','datacenter','estatus','solicitante','responsable','validacion','notas'      ];


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	public $comboEstatus = ['Iniciado', 'En Proceso','Completo', 'Pendiente' ];
}
