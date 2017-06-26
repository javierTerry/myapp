<?php

use Illuminate\Database\Seeder;

class UsersDosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert(array(
			'name' 	=> 'Lian Badillo'
			,'email'=> 'lian.badillo@prueba.com'
			,'password'	=>	\Hash::make('pass')
			,
			));
    }
}
