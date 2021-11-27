<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('orders')->truncate();
        DB::table('orders')->insert([
                [
                    'id' => '1',
                    'ship_name' => 'Quoc Hung',
                    'ship_phone' => '0123456789',
                    'ship_address' => 'Xuan Khanh',
                    'ship_note' => '9h ngay 20/12/2021',
                    'total_price' => 5,
                    'status' => 2,
                ],

                [
                    'id' => '2',
                    'ship_name' => 'Trinh Huy',
                    'ship_phone' => '0125436719',
                    'ship_address' => 'Ha Noi',
                    'ship_note' => '12h ngay 15/12/2021',
                    'total_price' => 5,
                    'status' => 2,
                ],

                [
                    'id' => '3',
                    'ship_name' => 'Minh Quang',
                    'ship_phone' => '4353682461',
                    'ship_address' => 'Ha Noi',
                    'ship_note' => '9h ngay 20/12/2021',
                    'total_price' => 4,
                    'status' => 1,
                ],

                [
                    'id' => '4',
                    'ship_name' => 'Nhat Huy',
                    'ship_phone' => '0125436719',
                    'ship_address' => 'Ha Noi',
                    'ship_note' => '9h ngay 20/12/2021',
                    'total_price' => 5,
                    'status' => 1,
                ],

                [
                    'id' => '5',
                    'ship_name' => 'Bui Ai',
                    'ship_phone' => '043252141',
                    'ship_address' => 'Ha Noi',
                    'ship_note' => '9h ngay 11/12/2021',
                    'total_price' => 6,
                    'status' => 0,
                ]
            ]
        );
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
