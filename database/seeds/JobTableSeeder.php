<?php

use App\Models\Scheduler;
use App\Models\Job;
use App\Models\Artifact;
include_once 'TableSeeder.php';

class JobTableSeeder extends TableSeeder{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Implement run() method.

        $schedulerIds = Scheduler::where('id' ,'>' ,0)->pluck('id')->toArray();
        $artifactIds  = Artifact::where('id' ,'>' ,0)->pluck('id')->toArray();
        foreach(range(1,50) as $index){

            Job::create([
                'scheduler_id' => $this->faker->randomElement($schedulerIds),
                'artifact_id' => $this->faker->randomElement($artifactIds),
                'name' => $this->faker->text(20),
                'description'=> $this->faker->realText(100),
                'agent_key'=>$this->faker->md5,
                'status'=>'Init'

            ]);
        }

    }
}