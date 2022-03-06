<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAudCmdbReporteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aud_cmdb_reporte', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('estado')->default(1);

            $table->string('datacenter',50)->default('dcDefault');
            $table->string('fase',50)->default('faseDefault');
            $table->string('rack',50)->default('rackDefault');
            $table->string('nombre',50)->default('NombreCI');
            $table->string('ns',50)->default('nsCI');
            $table->string('producto',50)->default('producto');
            $table->string('modelo',50)->default('modelo');
            $table->string('propietarioNombre',50)->default('propietarioNombre');
            $table->string('propietarioContacto',50)->default('propietarioContato');
            $table->mediumInteger('idVisual')->default('0');
            $table->mediumInteger('idCmdb')->default('0');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aud_cmdb_reporte');
    }
}
