<?php

/**
 * Created by PhpStorm.
 * User: xiangyuwang
 * Date: 7/13/16
 * Time: 4:41 PM
 */


use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TableSeeder extends Seeder
{

    protected $faker;

    public function __construct(Faker $factory)
    {
        $faker = $factory->create();
        $this->faker = $faker;

    }

    public function run()
    {

    }

}