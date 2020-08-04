<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionesProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
	Schema::create('promociones_productos', function (Blueprint $table) {
	    $table  -> integer('promocion_id')
		    -> unsigned();
	    $table  -> foreign('promocion_id')
		    -> references('id')
		    -> on('promociones')
		    -> onDelete('cascade');
	    $table  -> integer('producto_id')
		    -> unsigned();
	    $table  -> foreign('producto_id')
		    -> references('id')
		    -> on('products')
		    -> onDelete('cascade');
	    $table  -> enum('dtype', ["$", "%"])
		    -> default("$");
	    $table  -> decimal('final_price', 7, 2);
	    $table  -> decimal('discount', 7, 2);
	});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
	Schema::dropIfExists('promociones_productos');
    }
}
