<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameProyectoClienteProveedorBpo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bpo', function (Blueprint $table) {
            //
            $table -> renameColumn('PROYECTO', 'proyecto');
			$table -> renameColumn('CLIENTE', 'cliente');
			$table -> renameColumn('PROVEEDOR', 'proveedor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bpo', function (Blueprint $table) {
            //
            $table -> renameColumn('proyecto','PROYECTO');
			$table -> renameColumn('cliente', 'CLIENTE');
			$table -> renameColumn('proveedor','PROVEEDOR');
        });
    }
}
