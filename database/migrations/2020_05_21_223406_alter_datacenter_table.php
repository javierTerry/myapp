<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDatacenterTable extends Migration
{
    /**
     * Se agrega la columna status, para poder validar los registros activos.
     * @author Christian Hernandez 
     * @since  202005
     * @return void
     */
    public function up()
    {
        Schema::table('datacenter', function (Blueprint $table) {
            $table->boolean('status')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datacenter', function (Blueprint $table) {
             $table->dropColumn('status');
        });
    }
}
