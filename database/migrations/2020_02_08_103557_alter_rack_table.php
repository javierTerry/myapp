<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterRackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rack', function (Blueprint $table) {
            $table->integer('id_fase')->after('id');
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
        Schema::table('rack', function (Blueprint $table) {
            //
            $table->dropColumn('id_fase');
            $table->dropColumn('status');
        });
    }
}
