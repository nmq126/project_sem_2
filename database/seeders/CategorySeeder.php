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

                'id' => '1',
                'name' => 'Bánh mì - xôi',
                'description' => 'Các món bánh mì, xôi truyền thống mang hương vị ba miền',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638114767/categories/banh-mi_wmk5kj.png'
            ],
            [
                'id' => '2',
                'name' => 'Món nước',
                'description' => 'Các món bún phở miến ',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638114769/categories/pho_sgihgo.png'
            ],
            [
                'id' => '3',
                'name' => 'Cơm phần',
                'description' => 'drink',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638114991/categories/fried-rice_pnxacz.png'
            ],
            [
                'id' => '4',
                'name' => 'Fast food',
                'description' => 'drink',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638115078/categories/fast-food_ibgu6m.png'
            ],
            [
                'id' => '5',
                'name' => 'Đồ uống',
                'description' => 'Các món đồ uống giải khát siêu hot',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638115154/categories/bubble-tea_b9llxj.png'
            ],
            [
                'id' => '6',
                'name' => 'Đồ chay',
                'description' => 'Bạn tìm món chay, VietKitchen có ngay!',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638115205/categories/vegan-food_erj3cl.png'
            ],
            [
                'id' => '7',
                'name' => 'Ăn vặt',
                'description' => 'Các món ăn vặt đường phố với chất lượng nhà hàng',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638115331/categories/food-cart_vjpu6i.png'
            ],
            [
                'id' => '8',
                'name' => 'Món Quốc tế',
                'description' => 'Món ngon năm châu, chất lượng năm sao',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638115433/categories/sushi_xxizwt.png'
            ],

            [
                'id' => '9',
                'name' => 'Tráng miệng',
                'description' => 'drink',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638116439/categories/dessert_laupyb.png'
            ],
            [
                'id' => '10',
                'name' => 'Món Gà',
                'description' => 'Các món ăn được chế biến từ gà',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638116514/categories/chicken-leg_vdjdpz.png'
            ],
            [
                'id' => '11',
                'name' => 'Hải sản',
                'description' => 'Các món hải sản tươi ngon hấp dẫn',
                'thumbnail' => 'https://res.cloudinary.com/dwpmaxxjg/image/upload/v1638116673/categories/seafood_fj7rhe.png',

            ],

        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
