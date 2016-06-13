<?php namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Log;

class HistoryBackup extends Model
{
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'history_backups';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [];
	
	/**
	 * Parsed the data that get by request
	 * 
	 * @author Christian Hernandez <javierv31@gmail.com>
	 * @var array
	 * @param  Request  file
     * @return Response
	 */
	public function parser(Request $request){
		
			Log::info(print_r($request -> route()->getPath(),TRUE));
		
		
		
	}
}
