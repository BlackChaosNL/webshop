<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $dogs = ['12 bringing home puppy 2.jpg', 'afp-cute-puppy.jpg', 'b7df718141757a559498cdf15cbfec60.jpg', 'images (1).jpg', 'images (3).jpg',
        'images (4).jpg', 'images.jpg', 'The_Puppy.jpg', 'UWgub.jpg'];
        $cats = ['3528kitten.jpg', '15707-Cute-fluffy-silver-tortoiseshell-kitten-white-background.jpg', '34374-Ginger-kitten-walking-forward-white-background.jpg',
        '159706-357x421-kitten.jpg', 'download.jpg', 'images (5).jpg', 'images (6).jpg', 'images (7).jpg', 'playful-kitten-6683.jpg', 'siamese-kittens-ov1xghkx.jpg'];
        $toysNSupplies = ['91elzNDzcrL._SX425_.jpg', '11177193.png', 'contemporary-pet-supplies.jpg', 'Diamond-Collage.jpg', 'dogs10.jpg', 'download (1).jpg', 'download (2).jpg',
        'download_diff.jpg', 'Food-Coupons-Online.png', 'Funny-Feather-Cat-Play-Toys-With-Ring-Promotional-Pet-Toy-Pet-Products-Pet-Supplies-Accessories-Cat.jpg', 'images (1)_diff.jpg',
        'images (2)_diff.jpg', 'images (3)_diff.jpg', 'images (4)_diff.jpg', 'images (5)_diff.jpg', 'images (6)_diff.jpg', 'images (7)_diff.jpg', 'images (8).jpg', 'images (9).jpg',
        'images (10).jpg', 'images (11).jpg', 'images (12).jpg', 'images (13).jpg', 'images_diff.jpg', 'Kyjen-Group-300x300.jpg', 'Pet-dog-toys-tennis-ball-hard-elastic-color.jpg',
        'petfood1.png', 'Pet-Toys.jpg', 'rope.jpg', 'Smartcat-Pet-Toy-Box-1.jpg'];
        $food = [$toysNSupplies[1], $toysNSupplies[3], $toysNSupplies[7], $toysNSupplies[8], $toysNSupplies[10], $toysNSupplies[12], $toysNSupplies[13], $toysNSupplies[19], $toysNSupplies[27]];
        $cages = [$toysNSupplies[22]];
        $bowls = [$toysNSupplies[4], $toysNSupplies[15], $toysNSupplies[18], $toysNSupplies[19], $toysNSupplies[20]];
        $shampoos = [$toysNSupplies[15]];
        $catFood = [];
        $dogFood = [];
        $items = [sizeOf($dogs), sizeOf($cats), sizeOf($toysNSupplies), sizeOf($food), sizeOf($cages), sizeOf($bowls), sizeOf($shampoos), sizeOf($catFood), sizeOf($dogFood)];

        for($i = 0; $i < count($items); $i++){
            $table = [];
            $maxRand = 1;
            switch($i){
                case 0:
                    $table = $dogs; 
                    break;
                case 1:
                    $table = $cats;
                    break;
                case 2:
                    $table = $toysNSupplies;
                    $maxRand = 30;
                	break;
                case 3:
                    $table = $food;
                    $maxRand = 30;
                    break;
                case 4:
                    $table = $cages;
                    $maxRand = 30;
                    break;
                case 5:
                    $table = $bowls;
                    $maxRand = 60;
                    break;
                case 6:
                    $table = $shampoos;
                    $maxRand = 15;
                    break;
                case 7:
                    $table = $catFood;
                    $maxRand = 30;
                    break;
                case 8:
                    $table = $dogFood;
                    $maxRand = 30;
                    break;
            }
            for($n = 0; $n < $items[$i]; $n++){
                DB::table('product')->insert([
                    'name' => $faker->firstName,
                    'piece' => rand(1, $maxRand),
                    'category' => $i+1,
                    'small_desc' => $faker->text($maxNbChars = 100),
                    'large_desc' => $faker->text($maxNbChars = 255),
                    'picture' => $table[$n],
                    'price' => rand(1, 999)
                ]);
            }
        }
    }
}
