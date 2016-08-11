<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // create admin account
        DB::table('role')->insert([
            'name' => 'Admin',
            'description' => 'Admin Group',
        ]);
        DB::table('role')->insert([
            'name' => 'Support',
            'description' => 'Supporting Group',
        ]);
        DB::table('role')->insert([
            'name' => 'Marketing',
            'description' => 'Marketing Group',
        ]);

        DB::table('role')->insert([
            'name' => 'QA',
            'description' => 'QA Group',
        ]);
    }
}
