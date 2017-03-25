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
            'email' => 'jjvijgen@gmail.com',
            'name' => 'Jeroen',
            'surname' => 'Vijgen',
            'password' => bcrypt('admin'),
            'role' => 1,
            'address' => '',
            'housenr' => rand(1,600),
            'zipcode' => rand(4,4).''.str_random(2),
            'place' => '',
            'country' => 'Netherlands'
        ]);
    }
}
