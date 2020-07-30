<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table  -> increments('id');
            $table  -> string('name');
            $table  -> string('email')
                    -> unique();
            $table  -> string('password');
            /*
            $table  -> string('address');
            $table  -> string('phone');
            $table  -> string('city');
            $table  -> string('state');
            $table  -> string('zip');
            $table  -> string('fbprofile');
            $table  -> string('twprofile');
            $table  -> string('igprofile');
            $table  -> text('avatar');
            */
            $table  -> enum('role', ['super', 'admin', 'user']);
            $table  -> mediumInteger('permissions')
                    -> default(444);
            $table  -> boolean('active')
                    -> default(1);
            $table  -> rememberToken();
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
        Schema::dropIfExists('users');
    }
}
