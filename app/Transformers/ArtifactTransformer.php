<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/3/2016
 * Time: 1:48 PM
 */

namespace App\Transformers;


use App\Models\Artifact;
use League\Fractal\TransformerAbstract;

class ArtifactTransformer extends TransformerAbstract {

//
//    /**
//     * List of resources possible to include
//     *
//     * @var array
//     */
//    protected $availableIncludes = [
//        'artifact','scheduler'
//    ];


//    public function includeArtifact(Job $job)
//    {
//        $artifact = $job->artifact();
//        return $this->item($artifact, new ArtifactTransformer());
//    }

    public function transform(Artifact $artifact)
    {


        return [
//            'id'           => $artifact->id,
            'version'        => $artifact->verion,
            'url'      => $artifact->url,

        ];
    }
}