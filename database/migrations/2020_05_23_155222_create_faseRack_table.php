<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaseRackTable extends Migration
{
    /**
     * Se actualiza la vista para mostrar los registros activos.
     * @author Christian Hernandez 
     * @since  202005
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS  fase_rack");
        DB::statement(" 
            CREATE  
                SQL SECURITY DEFINER
            VIEW `fase_rack` AS
                SELECT 
                    `fase`.`id` AS `id`,
                    `fase`.`created_at` AS `created_at`,
                    `fase`.`updated_at` AS `updated_at`,
                    `fase`.`name` AS `name`,
                    `fase`.`desc` AS `desc`,
                    `fase`.`id_datacenter` AS `id_datacenter`,
                    (SELECT 
                            COUNT(1)
                        FROM
                            `rack`
                        WHERE
                            (`rack`.`id_fase` = `fase`.`id`)) AS `no_rack`
                FROM
                    `fase`
                WHERE
                    `fase`.`status` = 1;
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS  fase_rack");
    }
}
