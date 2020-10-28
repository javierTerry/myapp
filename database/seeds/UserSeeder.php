<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
			,'rfc'	=> 	'HESC87321UY4'
			,
			));
	}

}
