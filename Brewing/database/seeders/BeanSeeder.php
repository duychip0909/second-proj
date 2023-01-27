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
                'image' => 'https://images.unsplash.com/photo-1596253420645-f342693480aa?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1702&q=80',
                'description' => 'Arabica Coffee is brewed coffee or coffee beans from the coffee plant species Coffea arabica or one of its varietals such as Typica (Coffea arabica var. typica), Bourbon (Coffea arabica var. bourbon), Heirloom (Coffea arabica var. heirloom), or Arabica (Coffea arabica var. arabica).',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'bean' => 'Robusta',
                'image' => 'https://images.unsplash.com/photo-1580933073521-dc49ac0d4e6a?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1469&q=80',
                'description' => 'The Robusta coffee variety originated in Central and West Africa. At the end of the 19th century, the discovery of Robusta in the Congo opened the way for coffee cultivation on lowland areas. The name Robusta is by no means a misnomer: The variety is stronger, more resistant to diseases and more productive.',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
