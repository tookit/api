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
        $this->call('SchedulerTableSeeder');
        $this->call('ArtifactTableSeeder');
        $this->call('JobTableSeeder');
    }
}
