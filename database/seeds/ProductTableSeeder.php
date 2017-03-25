<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Product')->insert([
            'name' => 'Jeffrey',
            'piece' => 1,
            'category' => 1,
            'small_desc' => '13 wk old retriever',
            'large_desc' => 'Jeffrey is a playful, thirtheen week old retriever. That just found out about shoes!',
            'small_pic' => '',
            'large_pic' => 'afp-cute-puppy.jpg',
            'price' => rand(1, 999)
        ]);
        DB::table('Product')->insert([
            'name' => 'George',
            'piece' => 1,
            'category' => 1,
            'small_desc' => '8 wk old snautzer',
            'large_desc' => 'George is an eight week old snautzer. We cannot give him away at this time, but he will be ready for his new home in four weeks!',
            'small_pic' => '',
            'large_pic' => 'images (1).jpg',
            'price' => rand(1, 999)
        ]);
        DB::table('Product')->insert([
            'name' => 'Lucas',
            'piece' => 1,
            'category' => 2,
            'small_desc' => 'Playful homebound kitten, no breed.',
            'large_desc' => 'He is twelve weeks old, and he is ready to be placed into a home!',
            'small_pic' => '',
            'large_pic' => '3528kitten.jpg',
            'price' => rand(1, 999)
        ]);
        DB::table('Product')->insert([
            'name' => 'Mary',
            'piece' => 1,
            'category' => 2,
            'small_desc' => 'She\'s eight weeks old.',
            'large_desc' => 'Mary is ready for her new home in four weeks!',
            'small_pic' => '',
            'large_pic' => '159706-357x421-kitten.jpg',
            'price' => rand(1, 999)
        ]);
    }
}