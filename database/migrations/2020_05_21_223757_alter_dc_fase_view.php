<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterDcFaseView extends Migration
{
    /**
     * Run the migrations.
     * Se actualiza la vista para mostrar los registros activos.
     * @author Christian Hernandez 
     * @since  202005
     *
     * @return void
     */

    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS  dc_fase");
        DB::statement(" 
            CREATE  
                    SQL SECURITY DEFINER
            VIEW `dc_fase` AS
                SELECT 
                    `datacenter`.`id` AS `id`,
                    `datacenter`.`created_at` AS `created_at`,
                    `datacenter`.`updated_at` AS `updated_at`,
                    `datacenter`.`name` AS `name`,
                    `datacenter`.`desc` AS `desc`,
                    `datacenter`.`status` AS `status`
                    ,(SELECT 
                            COUNT(`fase`.`id_datacenter`)
                        FROM
                            `fase`
                        WHERE
                            (`fase`.`id_datacenter` = `datacenter`.`id`)) AS `no_fase`
                FROM
                    `datacenter`
                WHERE 
                    `datacenter`.`status` = 1
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS dc_fase ");
    }
}
