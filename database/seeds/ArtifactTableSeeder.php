<?php

use Illuminate\Database\Seeder;

class ArtifactTableSeeder extends TableSeeder{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,10,1) as $index)
        {
            \App\Models\Artifact::create([
                'url'=> "http://local.api.cronman.esg.zone/api/job/{$index}",
                'version'=>$this->faker->randomDigit(),
                'manifest'=> '',
                'shellscript'=> base64_encode('
                     echo "Hello World"
                 ')
            ]);
        }
    }
}