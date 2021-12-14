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
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('order_details')->truncate();
        DB::table('order_details')->insert([
           [
                'product_id' => '1',
                'order_id' => '1',
                'quantity' => '3',
                'unit_price' => 32400,
            ],

            [
                'product_id' => '4',
                'order_id' => '1',
                'quantity' => '1',
                'unit_price' => 9000,
            ],

            [
                'product_id' => '6',
                'order_id' => '2',
                'quantity' => '1',
                'unit_price' => 54000,
            ],

            [
                'product_id' => '8',
                'order_id' => '2',
                'quantity' => '1',
                'unit_price' => 58500,
            ],

            [
                'product_id' => '10',
                'order_id' => '2',
                'quantity' => '1',
                'unit_price' => 58500,
            ],

            [
                'product_id' => '13',
                'order_id' => '3',
                'quantity' => '2',
                'unit_price' => 27000,
            ],

            [
                'product_id' => '14',
                'order_id' => '3',
                'quantity' => '1',
                'unit_price' => 22500,
            ],

            [
                'product_id' => '15',
                'order_id' => '3',
                'quantity' => '1',
                'unit_price' => 27000,
            ],

            [
                'product_id' => '10',
                'order_id' => '4',
                'quantity' => '1',
                'unit_price' => 58500,
            ],

            [
                'product_id' => '11',
                'order_id' => '4',
                'quantity' => '1',
                'unit_price' => 90000,
            ],

            [
                'product_id' => '17',
                'order_id' => '5',
                'quantity' => '1',
                'unit_price' => 40500,
            ],

            [
                'product_id' => '9',
                'order_id' => '5',
                'quantity' => '1',
                'unit_price' => 54000,
            ],

            [
                'product_id' => '33',
                'order_id' => '6',
                'quantity' => '2',
                'unit_price' => 49500,
            ],

            [
                'product_id' => '34',
                'order_id' => '6',
                'quantity' => '2',
                'unit_price' => 40500,
            ],
        ]);
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
