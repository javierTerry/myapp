<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBpoRenameFieldsTable extends Migration
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
            $table -> renameColumn('`costo_compra', 'costo_proyecto');
			$table -> renameColumn('costo_real', 'costo_real_proyecto');
			$table -> dropColumn("fecha_compra");
			$table -> dropColumn("precio_venta");
			$table -> dropColumn("avance_real");
			$table -> dropColumn("avance_planeado");
			$table -> dropColumn("desviacion");
			$table -> dropColumn("periodo_reportado");
			
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
            $table -> renameColumn('`costo_proyecto', 'costo_proyecto');
			$table -> renameColumn('costo_real_proyecto', 'costo_real');
			$table -> date("fecha_compra");
			$table -> integer("precio_venta");
			$table -> integer("avance_real");
			$table -> integer("avance_planeado");
			$table -> integer("desviacion");
			$table -> integer("periodo_reportado");
        });
    }
}
