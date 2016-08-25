<?php

namespace App\Providers;

use Illuminate\Http\Response;
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
        $this->registerFractalBinding();
        /** @var \Illuminate\Http\Request $request */
        $request = $this->app->make('request');
        if($request->isMethod('OPTIONS')) {
            $this->app->options($request->path(), function(Response $response){
                $response->header('Access-Control-Allow-Origin', '*');
                $response->header('Access-Control-Allow-Headers', 'Content-Type,Authorization');
                $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
                return $response;
            });
        }
    }

    public function registerFractalBinding()
    {
        $this->app->bind('League\Fractal\Manager', function($app) {
            $manager = new \League\Fractal\Manager;
            // Use the serializer of your choice.
            #$manager->setSerializer(new \App\Http\Serializers\RootSerializer);

            return $manager;
        });
    }



}
