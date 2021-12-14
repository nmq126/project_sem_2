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
//         $faker = \Faker\Factory::create();
//        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('orders')->truncate();
        DB::table('orders')->insert([



              [
                    'id' => '1',
                    'user_id' => '2',
                    'ship_name'=> 'Quang',
                    'ship_phone'=> '0855566809',
                    'ship_address' => '94 tân mai',
                    'ship_note' => 'nhiều hành',
                    'total_price' => 106200,
                    'checkout'=> '0',
                    'status' => '4',
                    'created_at'=>"2021-09-24 12:21:22.000000",

                ],

                [
                    'id' => '2',
                    'user_id' => '3',
                    'ship_name'=> 'Huy máy chém',
                    'ship_phone'=> '0126864567',
                    'ship_address' => '12 cầu giấy',
                    'ship_note' => 'không ớt',
                    'total_price' => 171000,
                    'checkout'=> '1',
                    'status' => '4',
                    'created_at'=>"2021-09-24 13:22:25.000000",

                ],

                [
                    'id' => '3',
                    'user_id' => '4',
                    'ship_name'=> 'Quốc Hưng',
                    'ship_phone'=> '045896545',
                    'ship_address' => '360 Xã Đàn',
                    'ship_note' => 'không hành',
                    'total_price' => 103500,
                    'checkout'=> '0',
                    'status' => '4',
                    'created_at'=>"2021-09-25 18:20:27.000000",

                ],

                [
                    'id' => '4',
                    'user_id' => '2',
                    'ship_name'=> 'bạn Quang',
                    'ship_phone'=> '0855566898',
                    'ship_address' => 'ngõ chợ Khâm Thiên',
                    'ship_note' => '',
                    'total_price' => 148500,
                    'checkout'=> '0',
                    'status' => '4',
                    'created_at'=>"2021-09-25 20:22:37.000000",

                ],

                [
                    'id' => '5',
                    'user_id' => '3',
                    'ship_name'=> 'Huy cầu giấy',
                    'ship_phone'=> '01254548965',
                    'ship_address' => '94 Cầu Giấy',
                    'ship_note' => '',
                    'total_price' => 94500,
                    'checkout'=> '1',
                    'status' => '4',
                    'created_at'=>"2021-09-26 10:55:55.000000",

                ],

                [
                    'id' => '6',
                    'user_id' => '3',
                    'ship_name'=> 'Huy cầu giấy',
                    'ship_phone'=> '01254548965',
                    'ship_address' => '94 Cầu Giấy',
                    'ship_note' => '',
                    'total_price' => 180000,
                    'checkout'=> '1',
                    'status' => '4',
                    'created_at'=>"2021-09-26 19:41:41.000000",

                ],




            ]
        );
//        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
