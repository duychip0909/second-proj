<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;
class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $limit = 50;

        for ($i = 0; $i < $limit; $i++) {
            Customer::insert([
                'customer_name' => $faker->name(),
                'customer_phone' => $faker->phoneNumber(),
                'customer_email' => $faker->safeEmail(),
                'customer_address' => $faker->address(),
                'customer_points' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
