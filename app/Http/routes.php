<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->post('/auth/login', 'Auth\AuthController@postLogin');

$app->group(['middleware' => 'jwt.auth'], function($app) {
    $app->get('/', function () use ($app) {
        return [
            'success' => [
                'app' => $app->version(),
            ],
        ];
    });

    $app->get('/me', function () use ($app) {

        return [
            'success' => [
                'user' => JWTAuth::parseToken()->authenticate(),
            ],
        ];
    });

    $app->get('/users','App\Http\Controllers\UserController@show');

    $app->get('/groups','App\Http\Controllers\RoleController@show');

    $app->get('/agents','App\Http\Controllers\AgentController@show');

    $app->get('/jobs','App\Http\Controllers\JobController@show');
    $app->get('/jobs/{id:\d+}','App\Http\Controllers\JobController@view');

    $app->post('/jobs','App\Http\Controllers\JobController@store');


    $app->get('/resources','App\Http\Controllers\ResourceController@show');

});
