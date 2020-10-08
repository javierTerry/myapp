<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipo', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();      

            $table->string('ur_usada',50);
            $table->string('soporte',100);
            $table->string('hostname',50);
            $table->string('iphw',50);
            $table->string('equipo_tipo',50);
            $table->string('modelo',50);
            $table->string('marca',50);
            $table->string('serie',50);
            $table->string('power',50);
            $table->tinyInteger('alarmado');
            $table->mediumInteger('id_rack');
            $table->boolean('status')->default(1);


        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('equipo');
    }
}
