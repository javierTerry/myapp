<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
	
class EmpleadoTableSeeder extends Seeder {

	/**
	 * Run the user table seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$faker = Faker::create();
		
		\DB::table('empleados')->insert(array(
			'nombre' 		=> $faker->firstname
			,'apellido_pat'	=> $faker->lastname
			,'apellido_mat'	=> $faker->lastname
			,'clave_puesto'	=> $faker->randomDigitNotNull
			,'RFC'			=> 'HESC8703'
			,'tel_casa'		=> $faker->randomDigitNotNull
			,'fecha_ing'	=> $faker->date($format = 'Y-m-d', $max = 'now')
			,'direccion'	=> $faker->streetName
			,'clave_area'	=> $faker->numberBetween($min = 1, $max = 100)
			,'clave_status'	=> $faker->numberBetween($min = 1, $max = 9)
			,'clave_rol'	=> $faker->numberBetween($min = 1, $max = 9)
			,'fecha_baja'	=> $faker->date($format = 'Y-m-d', $max = 'now')
			,'fecha_cambio'	=> $faker->date($format = 'Y-m-d', $max = 'now')
			,'jefe_inmediato'	=> $faker->numberBetween($min = 1, $max = 4)
			));
	}
	

} 

?>