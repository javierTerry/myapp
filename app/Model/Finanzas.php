<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Finanzas extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'finanzas';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['plataforma', 'ingresos', 'grossmar','ebitda', 'grossideal', 'ebitdaideal'];


}
