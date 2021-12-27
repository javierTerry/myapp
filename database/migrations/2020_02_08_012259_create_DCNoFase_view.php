<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDCNoFaseView extends Migration
{
    /**
     * Run the migrations.
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
                    (SELECT 
                            COUNT(`fase`.`id_datacenter`)
                        FROM
                            `fase`
                        WHERE
                            (`fase`.`id_datacenter` = `datacenter`.`id`)) AS `no_fase`
                FROM
                    `datacenter`
            ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
