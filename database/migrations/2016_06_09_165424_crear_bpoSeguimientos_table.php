<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearBpoSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bpo_seguimientos', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
			$table -> double('avance_planeado', 6, 2);
			$table -> double('avance_real', 6, 2);
			$table -> double('desviacion', 6, 2);
			$table -> date("fecha_de");
			$table -> date("fecha_hasta");
			$table -> string('observaciones', 100);
			$table -> integer('bpo_proyecto_id')->default(0) ;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bpo_seguimientos');
    }
}
