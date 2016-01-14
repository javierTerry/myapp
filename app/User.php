<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name','apellidos', 'email', 'password','rfc','direccion','jefe_inmediato','fecha_ing','fecha_baja','fecha_cambio','tel_casa','clave_area', 'clave_puesto', 'clave_rol'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function scopeNombre($query, $nombre)
	{
		if ( trim($nombre) != "")
		{
			$query->where('name', 'like', "%$nombre%");	
		}
		
	}
	
	public function scopeEmail($query, $email)
	{
		if ( trim($email) != "")
		{
			$query->where('email', $email);	
		}
		
	}
}
