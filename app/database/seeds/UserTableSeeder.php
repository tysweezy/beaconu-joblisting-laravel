<?php

class UserTableSeeder extends Seeder {

	public function run() {
		DB::table('users')->delete();


        $users = array(
            array(
                'username'   => 'admin123',
                'email'      => 'tyler@decipherinc.com',  
                'password'   => Hash::make('admin'),
                'first_name' => 'John',
                'last_name'  => 'Admin',
                'created_at' => new DateTime, 
                'updated_at' => new DateTime
            )
        );
		DB::table('users')->insert( $users );
	}
}