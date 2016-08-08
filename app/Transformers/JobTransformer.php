<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/3/2016
 * Time: 1:48 PM
 */

namespace App\Transformers;


use App\Models\Job;
use League\Fractal\TransformerAbstract;

class JobTransformer extends TransformerAbstract {


    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $defaultIncludes = [
        'artifact','scheduler'
    ];



    public function transform(Job $job)
    {
          return $job->toArray();

    }


    public function includeArtifact(Job $job)
    {

        $artifact = $job->artifact()->getResults();
        return $this->item($artifact, new ArtifactTransformer());
    }

    public function includeScheduler(Job $job)
    {
        return $this->item($job->scheduler()->getResults(),new SchedulerTransformer());
    }
}