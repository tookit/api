<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

use Faker\Factory;



$factory->define(App\Models\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});

$factory->define(App\Models\Job::class,function($faker){

    return [
        'name' => $faker->sentence(),
        'description'=> $faker->text,
        'agent_key'=>str_random(40),
        'status'=>'Init'

    ];
});


$factory->define(App\Models\Scheduler::class,function($faker){

    return [
        'starts_at' => $faker->unixTime(),
        'repeat_count' => $faker->randomDigit(),
        'ends_at' => ($faker->unixTime() + 3600),
        'repeat_interval' => $faker->randomDigit(),
        'repeate_unit' => $faker->randomElement()
    ];
});

$factory->define(App\Models\Artifact::class,function($faker){



    return [
        'url'=>  'http://local.api.cronman.esg.zone/api/job/'+ $faker->randomDigit(),
        'manifest'=> '',
        'shellscript'=> base64_encode('
           echo "Hello World"
        ')

    ];
});

