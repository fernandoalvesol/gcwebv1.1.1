<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        User::create([

            'name' => 'fernando',
            'email' => 'fernando@gmail.com',
	    'fone' => '99774455',
            'password' => bcrypt('123456'),
            
        ]);
    }

}
