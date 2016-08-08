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
        DB::table('user')->insert([
            'name' => env('ADMIN_USER'),
            'email' => env('ADMIN_EMAIL'),
            'password' => app('hash')->make(env('ADMIN_PASS')),
            'remember_token' => str_random(10),
        ]);
        DB::table('user')->insert([
            'name' => 'Joe Due',
            'email' => 'joe.due@gmail.com',
            'password' => app('hash')->make(env('ADMIN_PASS')),
            'remember_token' => str_random(10),
        ]);
    }
}
