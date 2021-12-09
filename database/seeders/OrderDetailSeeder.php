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
                'product_id' => '6',
                'order_id' => '1',
                'quantity' => '1',
                'unit_price' => 60000,
            ],
            [
                'product_id' => '26',
                'order_id' => '1',
                'quantity' => 1,
                'unit_price' => 80000,
            ],
            [
                'product_id' => '27',
                'order_id' => '1',
                'quantity' => 1,
                'unit_price' => 50000,
            ],
            [
                'product_id' => '13',
                'order_id' => '2',
                'quantity' => '3',
                'unit_price' => 30000,
            ],

            [
                'product_id' => '15',
                'order_id' => '3',
                'quantity' => '1',
                'unit_price' => 30000,
            ],
            [
                'product_id' => '30',
                'order_id' => '3',
                'quantity' => 1,
                'unit_price' => 55000 ,
            ],
            [
                'product_id' => '6',
                'order_id' => '3',
                'quantity' => 1,
                'unit_price' => 60000 ,
            ],
            [
                'product_id' => '7',
                'order_id' => '4',
                'quantity' => '1',
                'unit_price' => 80000 ,
            ],
            [
                'product_id' => '29',
                'order_id' => '4',
                'quantity' => 1,
                'unit_price' => 50000   ,
            ],
            [
                'product_id' => '8',
                'order_id' => '4',
                'quantity' => 1,
                'unit_price' => 65000   ,
            ],
            [
                'product_id' => '31',
                'order_id' => '5',
                'quantity' => '2',
                'unit_price' => 30000 ,
            ],
            [
                'product_id' => '22',
                'order_id' => '5',
                'quantity' => 2,
                'unit_price' => 40000   ,
            ],
            [
                'product_id' => '22',
                'order_id' => '6',
                'quantity' => 1,
                'unit_price' => 65000   ,
            ],
            [
                'product_id' => '31',
                'order_id' => '6',
                'quantity' => '2',
                'unit_price' => 30000 ,
            ],
            [
                'product_id' => '30',
                'order_id' => '6',
                'quantity' => 2,
                'unit_price' => 40000   ,
            ],

        ]);
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
