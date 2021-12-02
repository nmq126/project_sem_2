<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(BlogSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(ProductSeeder::class);
//        $this->call(OrderDetailSeeder::class);

//        $this->call(OrderSeeder::class);
    }
}
