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
                'id' => '1',
                'name' => 'chicken',
                'description' => 'gia cam'
            ],
            [
                'id' => '2',
                'name' => 'beef',
                'description' => 'gia suc'
            ]
            ,
            [
                'id' => '3',
                'name' => 'fish',
                'description' => 'ca'
            ]
            ,
            [
                'id' => '4',
                'name' => 'lemon',
                'description' => 'chanh'
            ]
            ,
            [
                'id' => '5',
                'name' => 'strawberry',
                'description' => 'dau'
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
