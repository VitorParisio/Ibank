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
        	'name' => 'Gabriel',
            'lastname' => 'Amaro',
        	'email'=> 'gamaro@cpj.com',
        	'password' => bcrypt('g23'),
        ]);

        User::create([
            'name' => 'Renier',
            'lastname' => 'Silva',
            'email'=> 'reni@cpj.com',
            'password' => bcrypt('reni23'),
        ]);

        User::create([
            'name' => 'Diego',
            'lastname' => 'Naja',
            'email'=> 'naja@cpj.com',
            'password' => bcrypt('123'),
        ]);

        User::create([
            'name' => 'Daniel',
            'lastname' => 'Totti',
            'email'=> 'totti@cpj.com',
            'password' => bcrypt('123'),
        ]);

         User::create([
            'name' => 'Vitor',
            'lastname' => 'Parisio',
            'email'=> 'v@v.com',
            'password' => bcrypt('123'),
        ]);
    }
}
