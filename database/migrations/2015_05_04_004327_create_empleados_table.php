<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpleadosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('empleados', function(Blueprint $table)
		{
			$table->increments('id_empleado');
			$table->string('nombre',20);
			$table->string('apellido_pat',20);
			$table->string('apellido_mat',20);
			$table->integer('clave_puesto')->length(10);
			$table->string('RFC',13);
			$table->integer('tel_casa')->length(15);
			$table->date('fecha_ing');
			$table->string('direccion',13);
			$table->integer('clave_area')->length(6);
			$table->string('clave_status',1);
			$table->integer('clave_rol')->lenght(6);
			$table->date('fecha_baja');
			$table->date('fecha_cambio');
			$table->integer('jefe_inmediato')->length(6);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('empleados');
	}

}
