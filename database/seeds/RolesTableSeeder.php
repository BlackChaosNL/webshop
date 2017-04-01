<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('role')->insert([
            'role' => 'admin'
        ]);
        DB::table('role')->insert([
            'role' => 'user'
        ]);
    }
}
