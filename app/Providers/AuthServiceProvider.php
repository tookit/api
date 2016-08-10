<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {

        //define lumen gates here
        Gate::define('User.Read', function ($user) {
//            var_dump($user->roles[0]->name);die();
            return $user->id ===  1;
        });

//        Gate::define('User.Create',function($user){
//
//            return $user->roles->name = 'Admin';
//        });
//
//        Gate::define('Job.Read',function($user){
//
//            $user->roles->name = 'Admin';
//        });

    }
}
