<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

	/**
	 * Run the user table seeds.
	 *
	 * @return void
	 */
	public function run()
	{
	
		\DB::table('users')->truncate();	
		\DB::table('users')->insert(array(
			'name' 	=> 'Christian Hernandez'
			,'email'=> 'chhernandezs@kionetworks.com'
			,'password'	=>	\Hash::make('jhsT3rry')
			,
			));
		\DB::table('users')->insert(array(
			'name' 	=> 'Administrator'
			,'email'=> 'admin@gmail.com'
			,'password'	=>	\Hash::make('administrator')
			,
			));

		\DB::table('users')->insert(array(
			'name' 	=> 'Maribel Luevano'
			,'email'=> 'mluevano@kionetworks.com'
			,'password'	=>	\Hash::make('bel$01MEX2')
			,
			));

		\DB::table('users')->insert(array(
			'name' 	=> 'Marisol Ruiz'
			,'email'=> 'mruiz@kionetworks.com'
			,'password'	=>	\Hash::make('sol$01MEX5')
			,
			));

		\DB::table('users')->insert(array(
			'name' 	=> 'Gustavo Cuatepotzo'
			,'email'=> 'gcuatepotzo@kionetworks.com'
			,'password'	=>	\Hash::make('gus$01QRO1')
			,
			));

		\DB::table('users')->insert(array(
			'name' 	=> 'Miguel Sanchez'
			,'email'=> 'msanchez@kionetworks.com'
			,'password'	=>	\Hash::make('mike$01MEX5')
			,
			));

		\DB::table('users')->insert(array(
			'name' 	=> 'Alejandrina Vega'
			,'email'=> 'aveg@kionetworks.com'
			,'password'	=>	\Hash::make('ale$01QRO1')
			,
			));
	}

} 

?>