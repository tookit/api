<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 7/7/2016
 * Time: 3:36 PM
 */

namespace App\Repositories;


use App\Models\Job;

use Prettus\Repository\Eloquent\BaseRepository;

class JobRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.

        return Job::class;
    }

    protected $fieldSearchable = [

        'name' => 'like',

    ];

    public function boot()
    {

    }

}