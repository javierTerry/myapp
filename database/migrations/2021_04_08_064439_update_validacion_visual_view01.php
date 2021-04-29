<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateValidacionVisualView01 extends Migration
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
            CREATE  
                SQL SECURITY DEFINER
            VIEW `validacionVisualView` AS
                 SELECT 
                    `equipo`.`id` AS `id`,
                    `datacenter`.`name` AS `dc`,
                    `fase`.`name` AS `fase`,
                    `rack`.`name` AS `rack`,
                    (SELECT 
                            IF((`equipo`.`alarmado` <> 1),
                                    'NO',
                                    'SI')
                        ) AS `alarmado`,
                    `equipo`.`soporte` AS `soporte`,
                    `equipo`.`hostname` AS `hostname`,
                    `equipo`.`iphw` AS `iphw`,
                    `equipo`.`serie` AS `serie`,
                    `equipo`.`modelo` AS `modelo`,
                    `equipo`.`marca` AS `marca`,
                    `equipo`.`equipo_tipo` AS `equipo`,
                    (SELECT IF((`equipo`.`power` <> 1), 'NO', 'SI')) AS `power`,
                    `equipo`.`ur_usada` AS `ur_usadas`
                    ,`equipo`.`ur_asignada` AS `ur_asignada`
                    ,`rack`.`ur` AS `ur_total`
                    ,`equipo`.`whatts` AS `whatts`
                    ,`equipo`.`garantia` AS `garantia`
                    ,CASE `equipo`.`propiedad`
                       WHEN 1 THEN  'MN' 
                       WHEN 2 THEN 'CLIENTE'
                       WHEN 3 THEN 'PROVEEDOR'
                    END AS `propiedad`

                FROM
                    (((`equipo`
                    JOIN `rack`)
                    JOIN `fase`)
                    JOIN `datacenter`)
                WHERE
                    ((`equipo`.`id_rack` = `rack`.`id`)
                    AND (`equipo`.`inventario` = 1)
                    AND (`rack`.`id_fase` = `fase`.`id`)
                    AND (`fase`.`id_datacenter` = `datacenter`.`id`))
                    
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS  validacionVisualView");
    }
}
