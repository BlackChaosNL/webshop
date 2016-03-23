<?php

use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Menu')->insert([
            'menu_item' => 'home',
            'link' => './'
        ]);
        DB::table('Menu')->insert([
            'menu_item' => 'blog',
            'link' => 'blog'
        ]);
        DB::table('Menu')->insert([
            'menu_item' => 'home',
            'link' => './'
        ]);
    }
}
