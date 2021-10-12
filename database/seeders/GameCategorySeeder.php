<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GameCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 12; $i++) {
            $randIncrement = random_int(1, 5);
            for ($j = 1; $j <= 11; $j += $randIncrement) {
                DB::table('game_categories')->insert([
                    'game_id' => $i,
                    'category_id' => $j,
                ]);
            }
        }
    }
}
