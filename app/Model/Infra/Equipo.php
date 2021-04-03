<?php

namespace App\Model\Infra;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'equipo';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'hostname', 'iphw', 'serie', 'soporte','ur_usada', 'equipo_tipo', 'modelo', 'marca', 'power','alarmado', 'id_rack'
								,'garantia','whatts','propiedad','ur_asignada'];
	

	/**
	 * Serch proyects by strig, clause like  .
	 *
	 * @author Christian Hernandez <chhernandezs@kionetworks.com>
	 * 
	 * @param array Request
	 * 
	 */
	public function scopeHostname($query, $hostname)
	{
		if (trim($hostname) !=  "") {
			$query->where('hostname', 'like', "%$hostname%");
		}
	}
	
}
 