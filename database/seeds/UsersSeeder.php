<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
        	'name' => 'Admin',
        	'email' => 'sopiehalimah@gmail.com',
        	'password' => bcrypt('admin'),
        	'role' => 'admin'
        	]);

        App\User::create([
        	'name' => 'Member',
        	'email' => 'sh@gmail.com',
        	'password' => bcrypt('member'),
        	'role' => 'member'
        	]);
    }
}
