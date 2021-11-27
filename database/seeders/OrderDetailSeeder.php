<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('order_details')->truncate();
        DB::table('order_details')->insert([
            [
                'product_id' => '1',
                'order_id' => '1',
                'quantity' => '1',
                'unit_price' => 3,
            ],
            [
                'product_id' => '4',
                'order_id' => '1',
                'quantity' => 2,
                'unit_price' => 1,
            ],

            [
                'product_id' => '2',
                'order_id' => '2',
                'quantity' => 1,
                'unit_price' => 4,
            ],

            [
                'product_id' => '5',
                'order_id' => '2',
                'quantity' => 1,
                'unit_price' => 1,
            ],

            [
                'product_id' => '3',
                'order_id' => '3',
                'quantity' => 1,
                'unit_price' => 3,
            ],

            [
                'product_id' => '5',
                'order_id' => '3',
                'quantity' => 1,
                'unit_price' => 1,
            ],

            [
                'product_id' => '1',
                'order_id' => '4',
                'quantity' => 1,
                'unit_price' => 3,
            ],

            [
                'product_id' => '5',
                'order_id' => '4',
                'quantity' => 2,
                'unit_price' => 1,
            ],

            [
                'product_id' => '2',
                'order_id' => '5',
                'quantity' => 1,
                'unit_price' => 4,
            ],

            [
                'product_id' => '4',
                'order_id' => '5',
                'quantity' => 1,
                'unit_price' => 1,
            ],

            [
                'product_id' => '5',
                'order_id' => '5',
                'quantity' => 1,
                'unit_price' => 1,
            ]




        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
