<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateCatalogoEstatusCamposIdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('catalogo_estatus', function (Blueprint $table) {
            //
            
            $table->increments('id');
			$table->timestamps();
			$table -> renameColumn('`clave_status', 'desc_status');
			$table -> renameColumn('`costo_compra', 'costo_proyecto');
			
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('catalogo_estatus', function (Blueprint $table) {
            //
        });
    }
}
