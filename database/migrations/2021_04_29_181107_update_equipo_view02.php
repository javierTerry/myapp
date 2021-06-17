<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateEquipoView02 extends Migration
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
                    `equipo`.`modelo` AS `modelo`,
                    `equipo`.`soporte` AS `soporte`,
                    `equipo`.`serie` AS `serie`
                    ,`equipo`.`alarmado` AS `alarmado`
                    ,`rack`.`name` AS `rack`
                    ,`datacenter`.`name` AS `dc`
                    ,`equipo`.`inventario` AS `inventario`,
                    (select if((`equipo`.`power` <> 1) ,'NO', 'SI')) AS `power`,
                    `equipo`.`marca` AS `marca`

                FROM
                    `equipo`,`rack`,`fase`,`datacenter`
                WHERE
                    (`equipo`.`id_rack` = `rack`.`id`)
                    AND (`rack`.`id_fase` = `fase`.`id`)
                    AND (`fase`.`id_datacenter` = `datacenter`.`id`)
                    
                    
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

