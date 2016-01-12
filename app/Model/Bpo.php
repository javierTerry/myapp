<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bpo extends Model{

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'bpo';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id','proyecto', 'cliente', 'proveedor', 'fechaini', 'fechafin', 'fechacompra','costocompro', 'costoreal', 'precioventa', 'avance'];
	
	


}
