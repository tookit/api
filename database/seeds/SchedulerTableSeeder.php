<?php

use App\Models\Scheduler;
include_once 'TableSeeder.php';

class SchedulerTableSeeder extends TableSeeder{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TODO: Implement run() method.
        // seed 10 scheduler

        foreach(range(1,10,1) as $index)
        {
            Scheduler::create([
                'starts_at'=> $this->faker->unixTime(),
                'ends_at'=> $this->faker->unixTime() + $this->faker->randomNumber(4),
                'repeat_count'=> $this->faker->randomDigit(),
                'repeat_interval'=> $this->faker->randomDigit(),
                'repeat_unit'=> $this->faker->randomElement(['s','m','h','D','W','M','Y'])
            ]);
        }

    }
}