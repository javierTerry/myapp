<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRackNoEquipoView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        //
        DB::statement("DROP VIEW IF EXISTS  rack_equipo");
        DB::statement("  
               CREATE VIEW `rack_equipo` AS
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
            FROM
                `rack`
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
        DB::statement("DROP VIEW rack_equipo");
    }
}
