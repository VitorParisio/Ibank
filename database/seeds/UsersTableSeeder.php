<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'Vitor Parísio',
        	'email'=> 'vitor@bisaweb.com.br',
        	'password' => bcrypt('123'),
        ]);

         User::create([
            'name' => 'Diego Parísio',
            'email'=> 'diego@bisaweb.com.br',
            'password' => bcrypt('123'),
        ]);
    }
}
