<?php namespace App\Model;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Area extends Model {

#	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'catalogo_areas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['clave_area', 'desc_area' ,'id'];
	
	public function scopeDescripcion($query, $descripcion)
	{
		if ( trim($descripcion) != "")
		{
			$query->where('desc_area', 'like', "%$descripcion%");	
		}
		
	}
	
	public function scopeClave($query, $clave)
	{
		if ( trim($clave) != "")
		{
			$query->where('clave_area', $clave);	
		}
		
	}

}
