<?php

use App\Models\Scheduler;
use App\Models\Job;
use App\Models\Artifact;
include_once 'TableSeeder.php';

class PermissionTableSeeder extends TableSeeder{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \Illuminate\Support\Facades\Artisan::call('permission:update');
    }
}