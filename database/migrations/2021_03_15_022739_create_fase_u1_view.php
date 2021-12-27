<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaseU1View extends Migration
{
    /**
     * Run the migrations.
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
                    `datacenter`.`name` AS `dc`,
                    (SELECT 
                            COUNT(1)
                        FROM
                            `rack`
                        WHERE
                            (`rack`.`id_fase` = `fase`.`id`)) AS `no_rack`
                FROM
                    `fase`, `datacenter` 
                where (`fase`.`id_datacenter` = `datacenter`.`id`)
                    and `fase`.`status` = 1
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
