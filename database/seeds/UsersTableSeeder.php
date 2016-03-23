<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'admin',
            'email' => str_random(10).'@gmail.com',
            'name' => '',
            'surname' => '',
            'password' => bcrypt('admin'),
            'role' => 'admin',
            'address' => '',
            'housenr' => rand(1,600),
            'zipcode' => rand(4,4).''.str_random(2),
            'place' => '',
            'country' => 'Netherlands'
        ]);
    }
}
