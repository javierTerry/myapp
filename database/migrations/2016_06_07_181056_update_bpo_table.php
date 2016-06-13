<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBpoTable extends Migration
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
            $table -> renameColumn('fechaini', 'fecha_inicial_planeada');
			$table -> renameColumn('fechafin', 'fecha_final_planeada');
			$table -> renameColumn('fechacompra', 'fecha_compra');
			$table -> renameColumn('costocompro', 'costo_compra');
			$table -> renameColumn('costoreal', 'costo_real');
			$table -> renameColumn('precioventa', 'precio_venta');
			$table -> renameColumn('avance', 'avance_real');
			$table -> date("fecha_inicial_real");
			$table -> date("fecha_final_real");
			$table -> double('avance_planeado', 4, 4);
			$table -> double('desviacion', 4, 4);
			$table -> string('periodo_reportado', 50);
			$table -> tinyInteger('status') ->default(1) ;
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
            $table -> renameColumn('fecha_inicial_planeada','fechaini');
			$table -> renameColumn('fecha_final_planeada','fechafin');
			$table -> renameColumn('fecha_compra', 'fechacompra');
			$table -> renameColumn('costo_compra','costocompro');
			$table -> renameColumn('costo_real', 'costoreal');
			$table -> renameColumn('precio_venta', 'precioventa');
			$table -> renameColumn('avance_real', 'avance');
			$table -> dropColumn("fecha_inicial_real");
			$table -> dropColumn("fecha_final_real");
			$table -> dropColumn('avance_planeado');
			$table -> dropColumn('desviacion');
			$table -> string('periodo_reportado');
			$table -> dropColumn('status');
        });
    }
}
