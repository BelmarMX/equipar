<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table  -> increments('id');
			$table  -> integer('category_id')
					-> unsigned();
			$table  -> foreign('category_id')
					-> references('id')
					-> on('products_categories')
					-> onDelete('cascade');
			$table  -> integer('subcategory_id')
					-> unsigned();
			$table  -> foreign('subcategory_id')
					-> references('id')
					-> on('products_subcategories')
					-> onDelete('cascade');
			$table  -> string('title');
			$table  -> text('slug');
			$table  -> text('modelo');
			$table  -> text('marca')
					-> nullable();
			$table  -> text('resumen');
			$table  -> text('caracteristicas')
					-> nullable();
			$table  -> text('tecnica')
					-> nullable();
			$table  -> decimal('precio', 7,2)
					-> nullable();
			$table  -> text('image');
			$table  -> text('image_rx')
					-> nullable();
			$table  -> text('file')
					-> nullable();
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
                Schema::dropIfExists('products');
        }
}
