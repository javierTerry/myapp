<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquipoView02 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS  equipoView");
        DB::statement(" 
            CREATE  
                SQL SECURITY DEFINER
            VIEW `equipoView` AS
                SELECT 
                    `equipo`.`id` AS `id`,
                    `equipo`.`hostname` AS `hostname`,
                    `equipo`.`iphw` AS `iphw`,
                    `equipo`.`marca` 
                    ,`equipo`.`modelo` AS `modelo`,
                    `equipo`.`soporte` AS `soporte`,
                    `equipo`.`serie` AS `serie`
                    ,`equipo`.`alarmado` AS `alarmado`
                    ,`rack`.`name` AS `rack`
                    ,`datacenter`.`name` AS `dc`
                    ,`fase`.`name` AS `fase`
                FROM
                    `equipo`,`rack`,`fase`,`datacenter`
                WHERE
                    (`equipo`.`id_rack` = `rack`.`id`)
                    AND (`rack`.`id_fase` = `fase`.`id`)
                    AND (`fase`.`id_datacenter` = `datacenter`.`id`)
                    AND `equipo`.`status` = 1    
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS  equipoView");
    }
}
