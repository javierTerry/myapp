<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipoAlarmadoView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS  view_equipo_alarmado");
        DB::statement("  
            CREATE VIEW `view_equipo_alarmado` AS
                SELECT 
                    `equipo`.`id` 
                    ,`equipo`.`hostname` 
                    ,`equipo`.`iphw`
                    ,`equipo`.`modelo`
                    ,`equipo`.`soporte`
                    ,`equipo`.`serie`
                FROM
                    `equipo`
                WHERE
                    `equipo`.`alarmado` = 1
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS  view_equipo_alarmado");
    }
}
