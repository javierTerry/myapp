<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEquipoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('equipo', function (Blueprint $table) {
            //
            $table->date('garantia')->default(now());
            $table->unsignedSmallInteger('whatts')->default(100);
            $table->unsignedTinyInteger('propiedad')->default(1);
            $table->string('ur_asignada', 10)->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('equipo', function (Blueprint $table) {
            $table->dropColumn('garantia');
            $table->dropColumn('whatts');
            $table->dropColumn('propiedad');
            $table->dropColumn('ur_asignada');
        });
    }
}
