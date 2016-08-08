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



    public function transform(Artifact $artifact)
    {


        return [
            'version'        => $artifact->verion,
            'url'      => $artifact->url,

        ];
    }
}