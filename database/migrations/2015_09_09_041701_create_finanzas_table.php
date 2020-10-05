<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanzasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('finanzas', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->date("fecha_ing");
			$table->string("plataforma");
			$table->integer("grossmar");
			$table->integer("ebitda");
			$table->integer("grossideal");
			$table->integer("ebitdaideal");
			$table->integer("ingresos");
					});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('finanzas');
	}

}
