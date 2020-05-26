<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRackView extends Migration
{
    /**
     * Se actualiza la vista para mostrar los registros activos.
     * Se Elimna la vita fase_rack
     *
     * @author Christian Hernandez 
     * @since  202005
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS  rack_equipo");
        DB::statement("DROP VIEW IF EXISTS  rackView");
        DB::statement("  
            CREATE VIEW `rackView` AS
                SELECT 
                    `rack`.`id` AS `id`,
                    `rack`.`created_at` AS `created_at`,
                    `rack`.`updated_at` AS `updated_at`,
                    `rack`.`coordenada` AS `coordenada`,
                    `rack`.`ur` AS `ur`,
                    `rack`.`name` AS `name`,
                    (SELECT 
                            COUNT(`equipo`.`id_rack`)
                        FROM
                            `equipo`
                        WHERE
                            (`rack`.`id` = `equipo`.`id_rack`)) AS `no_equipo`
                    ,(SELECT 
                            `datacenter`.`name`
                        FROM
                            `datacenter`,`fase`
                        WHERE
                            (`fase`.`id` = `rack`.`id_fase`)
                            and `datacenter`.`id` = `fase`.`id_datacenter` ) AS `dc` 
                    FROM
                    `rack`
                WHERE
                    `rack`.`status` = 1
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS  rackView");
    }
}
