<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductImagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('product_images', function (Blueprint $table) {
			$table -> increments('id');
			$table  -> integer('producto_id')
				-> unsigned();
			$table  -> foreign('producto_id')
				-> references('id')
				-> on('products')
				-> onDelete('cascade');
			$table  -> text('image');
			$table  -> text('image_rx')
					-> nullable();
			$table -> timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('product_images');
	}
}
