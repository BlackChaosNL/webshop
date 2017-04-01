<?php

use Illuminate\Database\Seeder;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog')->insert([
            'title' => 'My first blog',
            'blog' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras dapibus leo at nibh convallis, commodo pharetra lorem dapibus. Proin ac laoreet justo. Mauris euismod, tellus ut rutrum commodo, felis sem eleifend quam, in pharetra est ipsum a dui. Pellentesque mi dui, fringilla lacinia diam id, consequat dapibus massa. In pellentesque lectus sit amet orci tincidunt mollis. Morbi pellentesque eget dui in ullamcorper. In iaculis ex vitae quam aliquet dignissim. Morbi tincidunt ultricies lacinia. Donec sollicitudin nisl sit amet arcu elementum, ut commodo sapien finibus. Vestibulum sem erat, auctor in iaculis quis, auctor at lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Praesent molestie, ex at consequat mollis, orci orci malesuada diam, nec pretium lacus ipsum eu libero. Etiam euismod mollis lorem, ac finibus ex commodo porta. Curabitur id dapibus massa. Maecenas et lectus eget lacus faucibus bibendum mollis et eros. Maecenas laoreet ut arcu vel congue.'
        ]);
    }
}
