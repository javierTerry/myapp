<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Estatus extends Model {

#	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'catalogo_estatus';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['clave_estatus', 'desc_estatus'];
	
	public function scopeDescripcion($query, $descripcion)
	{
		if ( trim($descripcion) != "")
		{
			$query->where('desc_estatus', 'like', "%$descripcion%");	
		}
		
	}
	
	public function scopeClave($query, $clave)
	{
		if ( trim($clave) != "")
		{
			$query->where('clave_estatus', $clave);	
		}
		
	}
}
