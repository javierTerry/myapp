<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model {

#	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'catalogo_puestos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['clave_puesto', 'desc_puesto'];

	public function scopeDescripcion($query, $descripcion)
	{
		if ( trim($descripcion) != "")
		{
			$query->where('desc_puesto', 'like', "%$descripcion%");	
		}
		
	}
	
	public function scopeClave($query, $clave)
	{
		if ( trim($clave) != "")
		{
			$query->where('clave_puesto', $clave);	
		}
		
	}
}
