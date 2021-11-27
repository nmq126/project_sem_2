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
<<<<<<< HEAD
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

=======
                'id' => '1',
                'name' => 'food',
                'description' => 'food'
            ],
            [
                'id' => '2',
                'name' => 'drink',
                'description' => 'drink'
            ]
>>>>>>> e989e9b194e31916beb543cf43daddbd7c3fd682
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
