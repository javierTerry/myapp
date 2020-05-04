<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoHistorialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo_historial', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->increments('id');
            $table->timestamps();
            $table->string('reporto',50);
            $table->string('descripcion',100);
            $table->date('fecha_reporte');
            $table->integer('id_equipo');
            $table->string('ticket',30);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipo_historial');
    }
}
