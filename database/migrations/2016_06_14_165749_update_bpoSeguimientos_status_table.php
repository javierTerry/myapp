<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBpoSeguimientosStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bpo_seguimientos', function (Blueprint $table) {
            //
            $table -> integer('status')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bpo_seguimientos', function (Blueprint $table) {
            //
            $table -> dropColumn('status');
        });
    }
}
