<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterFaseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fase', function (Blueprint $table) {
            //
            $table->tinyInteger('id_datacenter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fase', function (Blueprint $table) {
            //
            $table->dropColumn('id_datacenter');
        });
    }
}
