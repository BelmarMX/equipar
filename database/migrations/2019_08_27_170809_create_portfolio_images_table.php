<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePortfolioImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('portfolio_images', function (Blueprint $table) {
            $table  -> increments('id');
            $table  -> integer('portfolio_id')
                    -> unsigned();
            $table  -> foreign('portfolio_id')
                    -> references('id')
                    -> on('portfolio')
                    -> onDelete('cascade');
            $table  -> string('title');
            $table  -> text('slug');
            $table  -> text('image');
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
        Schema::dropIfExists('portfolio_images');
    }
}
