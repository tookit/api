<?php

namespace App\Transformers;

use App\Models\Resource;
use League\Fractal\TransformerAbstract;

class ResourceTransformer extends TransformerAbstract{

    /**
     * List of resources possible to include
     *
     * @var array
     */
//    protected $defaultIncludes = [
//        'roles'
//    ];

    public function transform(Resource $model)
    {
        return $model->toArray();
    }


}