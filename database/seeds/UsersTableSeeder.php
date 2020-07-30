<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users') -> insert([
                'name'              => 'Belmar Alberto'
            ,   'email'             => 'contacto@dispersion.mx'
            ,   'password'          => bcrypt('prueba')
            ,   'role'              => 'super'
            ,   'permissions'       => 777
            ,   'active'            => 1
            ,   'created_at'        => Carbon::now()
        ]);
    }
}