<?php

use Illuminate\Database\Seeder;

class ArtifactTableSeeder extends Seeder{


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Models\Artifact::class, 10)->create();
    }
}