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

        $this->app['auth']->viaRequest('api', function ($request)
        {
            return \App\Models\User::where('email', $request->input('email'))->first();
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
