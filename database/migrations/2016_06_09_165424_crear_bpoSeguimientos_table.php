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
			$table -> double('avance_planeado', 4, 4);
			$table -> double('avance_real', 4, 4);
			$table -> double('desviacion', 4, 4);
			$table -> date("perido_de");
			$table -> date("perido_a");
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
