<?php

namespace App\Model\Infra;
use Log;
use Illuminate\Database\Eloquent\Model;

use DB;
class Rack extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'rack';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'coordenada', 'ur', 'name', 'id_fase'];
	
	
	/**
	 * Relaciona las Fases vs los Datacenteer.
	 *
	 * @author Christian Hernandez <chhernandezs@kionetwork.com>
	 * 
	 * @param array Request
	 * 
	 */
 
	public static function joinDcFase()
	{
		Log::info('Model Rack');
		
		 
		return DB::table('fase')
            ->join('datacenter', 'datacenter.id', '=', 'fase.id_datacenter')
            ->select('fase.id', DB::raw('concat(datacenter.name, "-", fase.name) as name') )
            ->get();

		Log::info('Model Rack exit');
	}

}
