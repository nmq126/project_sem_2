<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('ingredients')->truncate();
        DB::table('ingredients')->insert([
            [
                'name' => 'ga',
                'description' => 'gia cam'
            ],
            [
                'name' => 'bo',
                'description' => 'gia suc'
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
