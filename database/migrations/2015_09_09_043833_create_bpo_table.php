<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBpoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('bpo', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->string("PROYECTO", 255);
			$table->date("FECHAINI");
			$table->date("FECHAFIN");
			$table->date("FECHACOMPRA");
			$table->string("CLIENTE", 255);
			$table->integer("COSTOCOMPRO");
			$table->integer("COSTOREAL");
			$table->integer("PRECIOVENTA");
			$table->string("PROVEEDOR", 255);
			$table->integer("AVANCE");
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('bpo');
	}

}
