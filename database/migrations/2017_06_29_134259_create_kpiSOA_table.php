<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKpiSOATable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('kpi_soa', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            $table->string('cliente');
            $table->string('ambiente', 50);
            $table->string('ip',20);
            $table->string('hostname',50);
            $table->string('dominio',5);
            $table->string('tam_dominio',10);
            $table->string('fsar',10);
            $table->string('fsdr',10);
            $table->string('tam_tar', 20);
            $table->string('periodo');
            $table->string('estatus_respaldo',10);
            $table->string('nombre_file',50);
            $table->integer('fecha_file');
            $table->integer('estatus') ->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('kpi_soa');
    }
}
