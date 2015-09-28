<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model {

#	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'catalogo_roles';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['clave_rol', 'desc_rol'];
	
	public function scopeDescripcion($query, $descripcion)
	{
		if ( trim($descripcion) != "")
		{
			$query->where('desc_rol', 'like', "%$descripcion%");	
		}
		
	}
	
	public function scopeClave($query, $clave)
	{
		if ( trim($clave) != "")
		{
			$query->where('clave_rol', $clave);	
		}
		
	}

}
