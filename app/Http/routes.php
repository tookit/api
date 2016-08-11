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

$app->group(['middleware' => 'jwt.auth|role:Support'], function($app) {
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

    $app->get('/users', ['as'=>'User.Read', 'uses'=>'App\Http\Controllers\UserController@show']);
    $app->get('/users/{id:\d+}',['as'=>'User.Read','uses'=>'App\Http\Controllers\UserController@view']);
    $app->post('/users',['as'=>'User.Create','uses'=>'App\Http\Controllers\UserController@store']);

    $app->get('/roles', ['as'=>'Role.Read', 'uses'=>'App\Http\Controllers\RoleController@show']);
    $app->get('/roles/{id:\d+}',['as'=>'Role.Read','uses'=>'App\Http\Controllers\RoleController@view']);
    $app->post('/roles',['as'=>'Role.Create','uses'=>'App\Http\Controllers\RoleController@store']);

    $app->get('/groups',['as'=>'Group.Read','uses'=>'App\Http\Controllers\RoleController@show']);

    $app->get('/agents',['as'=>'Agents.Read','uses'=>'App\Http\Controllers\AgentController@show']);

    $app->get('/jobs',['as'=>'Job.Read','uses'=>'App\Http\Controllers\JobController@show']);

    $app->get('/jobs/{id:\d+}',['as'=>'Job.Read','uses'=>'App\Http\Controllers\JobController@view']);

    $app->post('/jobs',['as'=>'User.Create','uses'=>'App\Http\Controllers\JobController@store']);

    $app->get('/resources',['as'=>'Resource.Read','uses'=>'App\Http\Controllers\ResourceController@show']);

});
