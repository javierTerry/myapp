<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacku1View extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("DROP VIEW IF EXISTS  rackView");
        DB::statement(" 
            CREATE  
                SQL SECURITY DEFINER
            VIEW `rackView` AS
                SELECT 
                    `rack`.`id` AS `id`,
                    `rack`.`created_at` AS `created_at`,
                    `rack`.`updated_at` AS `updated_at`,
                    `rack`.`coordenada` AS `coordenada`,
                    `rack`.`ur` AS `ur`,
                    `rack`.`name` AS `name`,
                    `fase`.`name` AS `fase`,
                    `datacenter`.`name` AS `dc`,
                    (SELECT 
                            COUNT(`equipo`.`id_rack`)
                        FROM
                            `equipo`
                        WHERE
                            (`rack`.`id` = `equipo`.`id_rack`)) AS `no_equipo`
                    FROM
                    `rack`, `fase`, `datacenter` 
                WHERE
                    `rack`.`status` = 1
                    AND (`fase`.`id` = `rack`.`id_fase`)
                    AND (`datacenter`.`id` = `fase`.`id_datacenter`)
                    
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
