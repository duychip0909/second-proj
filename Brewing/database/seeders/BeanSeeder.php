<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BeanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('beans')->truncate();
        DB::table('beans')->insert([
            [
                'bean' => 'Arabica',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bean' => 'Robusta',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
