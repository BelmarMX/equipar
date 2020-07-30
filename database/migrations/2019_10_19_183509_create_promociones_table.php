<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromocionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promociones', function (Blueprint $table) {
            $table  -> increments('id');
            $table  -> string('title');
            $table  -> text('slug');
            $table  -> text('image');
            $table  -> date('start');
            $table  -> date('end');
            $table  -> boolean('general_disc')
                    -> default(0);
            $table  -> decimal('amount', 7, 2)
                    -> nullable();
            $table  -> enum('type', ["$", "%"])
                    -> default("$");
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
        Schema::dropIfExists('promociones');
    }
}
