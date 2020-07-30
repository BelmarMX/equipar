<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table  -> increments('id');
            $table  -> string('nombre');
            $table  -> string('email')
                    -> unique('email');
            $table  -> string('phone');
            $table  -> string('company');
            $table  -> string('city');
            $table  -> string('state');
            $table  -> text('comments');
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
        Schema::dropIfExists('clientes');
    }
}
