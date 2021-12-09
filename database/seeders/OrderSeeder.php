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
        $faker = \Faker\Factory::create();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        DB::table('orders')->truncate();
        DB::table('orders')->insert([



                [
                    "user_id" =>$faker->numberBetween(1,20),
                    'ship_name'=> $faker->name,
                    'ship_phone'=> $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => 190000,
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2018-03-24 00:00:00.000000",

                ],
                [
                    "user_id" =>$faker->numberBetween(1,20),
                    'ship_name'=> $faker->name,
                    'ship_phone'=> $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => 90000,
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2018-07-04 00:00:00.000000",

                ],
                [
                    "user_id" =>$faker->numberBetween(1,20),
                    'ship_name'=> $faker->name,
                    'ship_phone'=> $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => 145000,
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2018-06-14 00:00:00.000000",

                ],
                [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => 195000,
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-01-17 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => 140000,
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-09-11 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => 70000,
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-03-13 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-01-23 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' =>  80000,
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-01-01 00:00:00",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => 200000,
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-07-18 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => 45000,
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-06-06 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => 365000,
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-01-23 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-04-15 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-09-25 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-02-12 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-06-14 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-01-08 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-04-30 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-05-01 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2019-05-28 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2020-03-24 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2020-01-14 00:00:00.000000",

                ],      [
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2020-06-07 00:00:00.000000",

                ],[
        "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2021-12-04 00:00:00.000000",

                ],
                [
                    "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2021-11-15 00:00:00.000000",

                ],
                [
                    "user_id" =>$faker->numberBetween(1,20),
                    'ship_name' => $faker->name,
                    'ship_phone' => $faker->phoneNumber,
                    'ship_address' => $faker->address,
                    'ship_note' => $faker->paragraph,
                    'total_price' => $faker->numberBetween(100000,5000000),
                    'checkout'=>$faker->numberBetween(0,1),
                    'status' => $faker->numberBetween(0,4),
                    'created_at'=>"2021-10-12 00:00:00.000000",

                ],




            ]
        );
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
