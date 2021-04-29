<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateValidacionVisualView02 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        DB::statement("DROP VIEW IF EXISTS  validacionVisualView");
        DB::statement(" 
            CREATE OR REPLACE
            SQL SECURITY DEFINER
            VIEW `validacionVisualView` AS
            select
                `equipo`.`id` AS `id`,
                `datacenter`.`name` AS `dc`,
                `fase`.`name` AS `fase`,
                `rack`.`name` AS `rack`,
                (
                select
                    if((`equipo`.`alarmado` <> 1),
                    'NO',
                    'SI')) AS `alarmado`,
                `equipo`.`soporte` AS `soporte`,
                `equipo`.`hostname` AS `hostname`,
                `equipo`.`iphw` AS `iphw`,
                `equipo`.`serie` AS `serie`,
                `equipo`.`modelo` AS `modelo`,
                `equipo`.`marca` AS `marca`,
                `equipo`.`equipo_tipo` AS `equipo`,
                (
                select
                    if((`equipo`.`power` <> 1),
                    'NO',
                    'SI')) AS `power`,
                `equipo`.`ur_usada` AS `ur_usadas`,
                `equipo`.`ur_asignada` AS `ur_asignada`,
                `rack`.`ur` AS `ur_total`,
                `equipo`.`whatts` AS `whatts`,
                `equipo`.`garantia` AS `garantia`,
                (case
                    `equipo`.`propiedad` when 1 then 'MN'
                    when 2 then 'CLIENTE'
                    when 3 then 'PROVEEDOR'
                end) AS `propiedad`
                ,`equipo`.`inventario` AS `inventario`
            from
                (((`equipo`
            join `rack`)
            join `fase`)
            join `datacenter`)
            where
                ((`equipo`.`id_rack` = `rack`.`id`)
                and (`rack`.`id_fase` = `fase`.`id`)
                and (`fase`.`id_datacenter` = `datacenter`.`id`))

            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('validacionVisualView');
    }
}
