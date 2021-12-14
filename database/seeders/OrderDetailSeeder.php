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
        ]);
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
