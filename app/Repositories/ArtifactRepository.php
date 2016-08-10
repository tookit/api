<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 7/7/2016
 * Time: 3:36 PM
 */

namespace App\Repositories;


use App\Models\Artifact;

use Prettus\Repository\Eloquent\BaseRepository;

class ArtifactRepository extends BaseRepository {


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.

        return Artifact::class;
    }

    protected $fieldSearchable = [

//        'name'=>'like',

    ];

    public function boot(){

    }


//    public function presenter()
//    {
//        return \App\Presenters\JobPresenter::class; // TODO: Change the autogenerated stub
//    }

}