<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_ingredient', function (Blueprint $table) {
            $table->increments('id');

            $table-> integer('category_id')->unsigned()->nullable();
            $table-> foreign('category_id')->references('id')->on('categories')->onDelete('cascade');


            $table-> integer('ingredient_id')->unsigned()->nullable();
            $table->foreign('ingredient_id')->references('id')->on('ingredients')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_ingredient');
    }
}
