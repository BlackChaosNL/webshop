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
            'address' => 'Van Delfthof',
            'housenr' => 209,
            'zipcode' => '5038BX',
            'place' => 'NB',
            'country' => 'Netherlands'
        ]);
    }
}
