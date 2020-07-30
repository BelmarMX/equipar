<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_articles', function (Blueprint $table) {
            $table  -> increments('id');
            $table  -> integer('category_id')
                    -> unsigned();
            $table  -> foreign('category_id')
                    -> references('id')
                    -> on('blog_categories')
                    -> onDelete('cascade');
            $table  -> string('title');
            $table  -> text('slug');
            $table  -> date('publish');
            $table  -> text('image');
            $table  -> text('image_rx')
                    -> nullable();
            $table  -> text('shortdesc');
            $table  -> text('content');
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
        Schema::dropIfExists('blog_articles');
    }
}
