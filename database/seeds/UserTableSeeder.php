<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create admin account
        DB::table('users')->insert([
            'name' => env('ADMIN_USER'),
            'email' => env('ADMIN_EMAIL'),
            'password' => app('hash')->make(env('ADMIN_PASS')),
            'remember_token' => str_random(10),
        ]);
    }
}
