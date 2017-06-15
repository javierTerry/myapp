<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanzasCarteraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('finanzas_cartera', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            $table->string('id_cliente');
            $table->string('cliente');
            $table->date('fecha');
            $table->string('antiguedad',50);
            $table->float('importe_moneda_local',11,2);
            $table->string('tipo_moneda',5);
            $table->string('texto',100);
            $table->float('importe_moneda_doc',11,2);
            $table->string('tipo_moneda_doc',5);
            $table->string('referencia', 20);
            $table->integer('referencia_factura');
            $table->string('finanzas_cartera',10);
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
        Schema::drop('finanzas_cartera');
    }
}
