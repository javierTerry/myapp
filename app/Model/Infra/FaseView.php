<?php

namespace App\Model\Infra;

use Illuminate\Database\Eloquent\Model;

class FaseView extends Model
{
        //
    /**
	 * The database table used by the model.
	 *
	 * @var string
	 */

	protected $table = 'fase_rack';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'name', 'desc', 'no_rack'];

}
