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
        	'name' => 'Arthu',
            'lastname' => 'Magno',
        	'email'=> 'arthu@bisaweb.com.br',
        	'password' => bcrypt('123'),
        ]);

         User::create([
            'name' => 'Ronaldo',
            'lastname' => 'Barros',
            'email'=> 'ronaldo@bisaweb.com.br',
            'password' => bcrypt('123'),
        ]);
    }
}
