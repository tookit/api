<?php

/**
 * Created by PhpStorm.
 * User: xiangyuwang
 * Date: 8/9/16
 * Time: 2:22 PM
 */
namespace App\Repositories\Critera;

class MyCritera implements \Prettus\Repository\Contracts\CriteriaInterface
{

    public function apply($model, \Prettus\Repository\Contracts\RepositoryInterface $repository)
    {
        // TODO: Implement apply() method.
        $model = $model->where('artifact_id','=', 1);
        return $model;
    }
}