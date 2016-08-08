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
        for($i = 0 ; $i <= 30;$i++){

            Job::create([
                'scheduler_id' => $this->faker->randomElement($schedulerIds),
                'artifact_id' => $this->faker->randomElement($artifactIds),
                'name' => $this->faker->text(20),
                'description'=> $this->faker->realText(100),
                'agent_key'=>$this->faker->md5,
                'status'=>$this->faker->randomElement(['Ready','Scheduled'])

            ]);
        }

    }
}