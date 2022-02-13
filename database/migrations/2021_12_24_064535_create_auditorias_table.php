<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuditoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aud_cmdb', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('estado')->default(1);

            $table->timestamp('fecha')->useCurrent();
            $table->string('datacenter',50)->default('MN1');
            $table->unsignedTinyInteger('estatus')->default(1);
            $table->string('solicitante',50)->default('correoSolicitante@ejemplo.com');
            $table->string('responsable',50)->default('correoResponsable@ejemplo.com');
            $table->unsignedTinyInteger('validacion')->default(0);
            $table->string('notas',50)->default('Comentarios referentes a la actividad');
            $table->string('idsEquipo',50)->default('1,2,3,4');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('aud_cmdb');
    }
}
