<?php

namespace App\Model\Infra;

use Illuminate\Database\Eloquent\Model;

class EquipoHistorial extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @author Christian Hernandez <chhernandezs@kionetworks.com>
	 * @var string
	 */

	protected $table = 'equipo_historial';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'reporto', 'id_equipo', 'descripcion','fecha_reporte','ticket'];


	/**
	 * Serch proyects by strig, clause like  .
	 *
	 * @author Christian Hernandez <chhernandezs@kionetworks.com>
	 * 
	 * @param array Request
	 * 
	 */
	public function scopeIdEquipo($query, $idEquipo)
	{
		if (trim($idEquipo) !=  "") {
			$query->where('id_equipo', '=', "$idEquipo")
					->orderBy('id', 'DESC');
		}
	}
	
}
