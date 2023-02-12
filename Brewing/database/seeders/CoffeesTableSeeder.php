<?php

namespace Database\Seeders;

use App\Models\Coffee;
use App\Models\Customer;
use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoffeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $faker->addProvider(new \Xvladqt\Faker\LoremFlickrProvider($faker));

        $faker->addProvider(new \FakerRestaurant\Provider\en_US\Restaurant($faker));

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            Coffee::insert([
                'name' => $faker->beverageName(),
                'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
                'price' => $faker->numberBetween(25000, 65000),
                'image' => $faker->imageUrl($width = 640, $height = 480, ['coffees'], false),
                'bean_id' => $faker->numberBetween(1, 2),
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
