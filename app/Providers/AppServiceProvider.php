<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class AppServiceProvider extends ServiceProvider
{


    public function boot(){

        DB::connection()->enableQueryLog();
    }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    public function registerFractal()
    {
        $this->app->bind('League\Fractal\Manager', function($app) {
            $manager = new \League\Fractal\Manager;

            // Use the serializer of your choice.
            #$manager->setSerializer(new \App\Http\Serializers\RootSerializer);

            return $manager;
        });
    }

}
