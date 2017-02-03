<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatalogoRolTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('catalogo_rol', function(Blueprint $table)
		{
			$table->increments('id');
			$table->timestamps();
			$table->integer('clave_rol')->length(6);
			$table->string('desc_rol',50);
		
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('catalogo_rol');
	}

}
