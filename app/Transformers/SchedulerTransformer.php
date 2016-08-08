<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/3/2016
 * Time: 1:48 PM
 */

namespace App\Transformers;


use App\Models\Scheduler;
use League\Fractal\TransformerAbstract;

class SchedulerTransformer extends TransformerAbstract {



    public function transform(Scheduler $scheduler)
    {


        return [
            'starts_at'        => $scheduler->starts_at,
            'ends_at'      => $scheduler->ends_at,

        ];
    }
}