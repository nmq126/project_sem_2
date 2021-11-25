<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('thumbnail');
            $table->string('description');
            $table->text('detail');
            $table->double('price');
            $table->unsignedInteger('discount')->default(0);
            $table->boolean('isFeatured')->default(false);
            $table->integer('status')->default(1);
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('ingredient_id')->references('id')->on('ingredients');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
