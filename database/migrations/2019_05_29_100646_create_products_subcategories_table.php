<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsSubcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_subcategories', function (Blueprint $table) {
            $table  -> increments('id');
            $table  -> integer('category_id')
                    -> unsigned();
            $table  -> foreign('category_id')
                    -> references('id')
                    -> on('products_categories')
                    -> onDelete('cascade');
            $table  -> string('title');
            $table  -> text('slug');
            $table  -> timestamps();
            $table  -> softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products_subcategories');
    }
}
