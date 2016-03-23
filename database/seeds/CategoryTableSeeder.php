<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Category')->insert([
            'cat_name' => 'animals'
        ]);
        DB::table('Category')->insert([
            'cat_name' => 'kittens',
            'cat_parent' => 'animals'
        ]);
        DB::table('Category')->insert([
            'cat_name' => 'puppies',
            'cat_parent' => 'animals'
        ]);
        DB::table('Category')->insert([
            'cat_name' => 'toys'
        ]);
        DB::table('Category')->insert([
            'cat_name' => 'cat toys',
            'cat_parent' => 'toys'
        ]);
        DB::table('Category')->insert([
            'cat_name' => 'dog toys',
            'cat_parent' => 'toys'
        ]);
        DB::table('Category')->insert([
            'cat_name' => 'food'
        ]);
        DB::table('Category')->insert([
            'cat_name' => 'feeders',
            'cat_parent' => 'food'
        ]);
        DB::table('Category')->insert([
            'cat_name' => 'carrying bags'
        ]);
    }
}
