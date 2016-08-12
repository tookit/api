<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{



    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $this->call('UserTableSeeder');
        $this->call('RoleTableSeeder');
        $this->call('RoleUserTableSeeder');
        $this->call('PermissionTableSeeder');
        $this->call('SchedulerTableSeeder');
        $this->call('ArtifactTableSeeder');
        $this->call('JobTableSeeder');
    }
}
