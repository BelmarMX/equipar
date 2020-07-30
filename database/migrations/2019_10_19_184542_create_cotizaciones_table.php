<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCotizacionesTable extends Migration
{

    public function up()
    {
        Schema::create('cotizaciones', function (Blueprint $table) {
            $table  -> increments('id');
            $table  -> integer('cliente_id')
                    -> unsigned();
            $table  -> foreign('cliente_id')
                    -> references('id')
                    -> on('clientes')
                    -> onDelete('cascade');
            $table  -> integer('product_id')
                    -> unsigned();
            $table  -> foreign('product_id')
                    -> references('id')
                    -> on('products')
                    -> onDelete('cascade');
            $table  -> integer('cantidad');
            $table  -> decimal('precio_final', 7, 2);
            $table  -> text('notes')
                    -> nullable()
                    -> comment('Describir si hay un descuento, precio normal, porcentaje de descuento, etc.');
            $table  -> timestamps();
            $table  -> softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cotizaciones');
	}
}
