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
        DB::table('Categories')->insert([
            'cat_name' => 'Puppies'
        ]);
        DB::table('Categories')->insert([
            'cat_name' => 'Kittens'
        ]);
        DB::table('Categories')->insert([
            'cat_name' => 'Toys & Supplies'
        ]);
        DB::table('Categories')->insert([
            'cat_name' => 'Food'
        ]);
        DB::table('Categories')->insert([
            'cat_name' => 'Cages',
            'cat_parent' => 3
        ]);
        DB::table('Categories')->insert([
            'cat_name' => 'Bowls',
            'cat_parent' => 3
        ]);
        DB::table('Categories')->insert([
            'cat_name' => 'Shampoo',
            'cat_parent' => 3
        ]);
        DB::table('Categories')->insert([
            'cat_name' => 'Cat Food',
            'cat_parent' => 4
        ]);
        DB::table('Categories')->insert([
            'cat_name' => 'Dog Food',
            'cat_parent' => 4
        ]);
    }
}
