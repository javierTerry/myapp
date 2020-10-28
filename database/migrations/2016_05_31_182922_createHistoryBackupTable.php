<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryBackupTable extends Migration
{
    /**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('history_backups', function(Blueprint $table)
		{
			$table->increments('id');
			$table -> string('cliente');
			$table -> string('host');
			$table -> string('esquema');
			$table -> string('tipo');
			$table -> string('recurrente');
			$table -> string('nombre_log');
			$table -> string('estatus');
			$table -> date('fecha');
			$table -> string('tipo_bd');
			$table->timestamps();
			
		});
	}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::drop('history_backups');
        
    }
}
