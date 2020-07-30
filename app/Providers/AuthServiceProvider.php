<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
        User::class => 'App\Policies\UsersPolicy',
    ];


    public function boot()
    {
        $this->registerPolicies();

        //Gates
        Gate::define('config', function(){
            return (Auth::user() -> role == 'super' || Auth::user() -> role == 'admin') && Auth::user() -> permissions >= 644;
        });

        Gate::resource('users', 'App\Policies\UsersPolicy', [
                'isAdmin'       => 'isAdmin'
            ,   'index'         => 'index'
            ,   'create'        => 'create'
            ,   'edit'          => 'edit'
            ,   'trim'          => 'trim'
            ,   'destroy'       => 'destroy'
        ]);
    }
}
