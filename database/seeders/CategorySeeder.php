<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('categories')->truncate();
        DB::table('categories')->insert([
            [
                'name' => 'Rau Trộn',
                'description' => 'Ngon - Bổ - Rẻ',
            ],
            [
                'name' => 'Gà',
                'description' => 'Ngon - Bổ - Rẻ',
            ],
            [
                'name' => 'Cơm Tấm',
                'description' => 'Ngon - Bổ - Rẻ',
            ],
            [
                'name' => 'Trà Sữa',
                'description' => 'Ngon - Bổ - Rẻ',
            ],
            [
                'name' => 'Cháo dinh dưỡng',
                'description' => 'Ngon - Bổ - Rẻ',
            ],
            [
                'name' => 'Ăn vặt',
                'description' => 'Ngon - Bổ - Rẻ',
            ],
            [
                'name' => 'Đồ ăn nhanh',
                'description' => 'Ngon - Bổ - Rẻ',
            ],
            [
                'name' => 'Pizza',
                'description' => 'Ngon - Bổ - Rẻ',
            ],
            [
                'name' => 'Bánh mỳ',
                'description' => 'Ngon - Bổ - Rẻ',
            ],
            [
                'name' => 'Mỳ Ý',
                'description' => 'Ngon - Bổ - Rẻ',
            ],

        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
