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
        	'name' => 'Vitor',
        	'email'=> 'vitor@vitor.com',
        	'password' => bcrypt('1234567'),
        ]);
    }
}
