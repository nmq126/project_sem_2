<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('products')->truncate();
        DB::table('products')->insert([
            [
                'id' => '1',
                'name' => 'Fried Chicken',
                'price' => 3,
                'category_id' => '1',
                'ingredient_id' => '1',
                'thumbnail' => 'https://cdn.statically.io/img/gachaybo.com/f=auto/wp-content/uploads/2021/07/4-ga-ran-kfc.jpg',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '123',
                'discount' => 10,
                'isFeatured' => 0,
                'status' => 1
            ],

            [
                'id' => '2',
                'name' => 'Pot-roast Beef',
                'price' => 4,
                'category_id' => '1',
                'ingredient_id' => '2',
                'thumbnail' => 'https://images.immediate.co.uk/production/volatile/sites/30/2020/08/recipe-image-legacy-id-1222463_11-7eaf5a2.jpg?quality=90&webp=true&resize=440,400',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '123',
                'discount' => 12,
                'isFeatured' => 0,
                'status' => 1
            ],
            [
                'id' => '3',
                'name' => 'Fried Fish',
                'price' => 3,
                'category_id' => '1',
                'ingredient_id' => '3',
                'thumbnail' => 'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/727bda84826873.5d6906eb29c0a.jpg',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '123',
                'discount' => 11,
                'isFeatured' => 0,
                'status' => 1
            ],

            [
                'id' => '4',
                'name' => 'Lemon Juice',
                'price' => 1,
                'category_id' => '2',
                'ingredient_id' => '4',
                'thumbnail' => 'https://tiimg.tistatic.com/fp/1/006/390/sour-taste-fresh-lemon-juice-190.jpg',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '123',
                'discount' => 0,
                'isFeatured' => 0,
                'status' => 1
            ],

            [
                'id' => '5',
                'name' => 'Strawberry Juice',
                'price' => 1,
                'category_id' => '2',
                'ingredient_id' => '5',
                'thumbnail' => 'https://vn.all.biz/img/vn/catalog/16002.jpg',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
                'detail' => '123',
                'discount' => 0,
                'isFeatured' => 0,
                'status' => 1
            ]
        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
