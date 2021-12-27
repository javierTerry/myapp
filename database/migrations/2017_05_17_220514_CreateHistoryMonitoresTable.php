<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryMonitoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_monitores', function(Blueprint $table)
        {
            $table->increments('id');
            $table->timestamps();

            $table->string('site');
            $table->string('cliente');
            $table->integer('total')->length(4);
            $table->integer('so')->length(4);
            $table->integer('bd')->length(4);
            $table->integer('app_server')->length(4);
            $table->integer('url')->length(4);
            $table->integer('query')->length(4);
            $table->integer('otros')->length(4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('history_monitores');
    }
}
