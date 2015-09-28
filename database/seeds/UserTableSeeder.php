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
		
		\DB::table('users')->insert(array(
			'name' 	=> 'Javier Herndez'
			,'email'=> 'javier@gmail.com'
			,'password'	=>	\Hash::make('pass')
			));
	}

} 

?>php 