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
    protected $availableIncludes = [
        'artifact','scheduler'
    ];


    public function includeArtifact(Job $job)
    {
        $artifact = $job->artifact();
        return $this->item($artifact, new ArtifactTransformer());
    }

    public function transform(Job $job)
    {

        return [
            'id'           => $job->id,
            'name'        => $job->name,
            'description'      => $job->description,
            'created_at'   => $job->created_at->toDateTimeString(),
            'updated_at'   => $job->updated_at->toDateTimeString(),
//            'artifacts'=> $job->getRelations('artifact')
        ];
    }
}