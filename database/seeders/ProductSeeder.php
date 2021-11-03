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
                'name' => 'LIBRE EAU DE PARFUM',
                'price' => '800000',
                'category_id' => '2',
                'thumbnail' => 'https://res.cloudinary.com/nmq126/image/upload/v1621679387/ey4xeidofecmu3mu9lqx.jpg',
                'description' => 'A floral fragrance with Lavender, Orange Blossom, & Musk Accord',
            ],

            [
                'name' => 'LE VERNIS LIMITED EDITION',
                'price' => '300000',
                'category_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/nmq126/image/upload/v1621826960/sy4y4qmnu1esjaqgbfcv.jpg',
                'description' => 'NAIL POLISH WITH LONG LASTING COLOUR AND SHINE.',
            ],
            [
                'name' => 'LOVE small 18ct yellow-gold wedding band',
                'price' => '3000000',
                'category_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/nmq126/image/upload/v1621834724/nnzyebx5n9c2jri9uge9.jpg',
                'description' => '18ct yellow-gold wedding ring',
            ],

            [
                'name' => 'TONIQUE CONFORT HYDRATING FACIAL TONER',
                'price' => '800000',
                'category_id' => '2',
                'thumbnail' => 'https://res.cloudinary.com/nmq126/image/upload/v1621825537/w7vabvzacg8kmjgphabn.jpg',
                'description' => 'The #1 Toner in the World!',
            ],

            [
                'name' => 'BLACK OPIUM EAU DE PARFUM',
                'price' => '1200000',
                'category_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/nmq126/image/upload/v1621678750/ibdzhiyyco9jf0gkxmtx.jpg',
                'description' => 'A warm & spicy fragrance with Coffee, White Flowers, & Vanilla',
            ],

            [
                'name' => 'ON THE BEACH',
                'price' => '1200000',
                'category_id' => '1',
                'thumbnail' => 'https://res.cloudinary.com/nmq126/image/upload/v1621835488/mhqdhurdblhudazc8dlo.png',
                'description' => 'ON THE BEACH',
            ],

            [
                'name' => 'TOP SECRETS NATURAL ACTION EXFOLIATOR',
                'price' => '500000',
                'category_id' => '2',
                'thumbnail' => 'https://res.cloudinary.com/nmq126/image/upload/v1621827263/gzhq501omj5cv0eiw8re.jpg',
                'description' => 'An exfoliant comprised of sugars and ultra-fine oils for gentle exfoliation.',
            ],

        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');

    }
}
