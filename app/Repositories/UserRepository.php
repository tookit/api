<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 7/7/2016
 * Time: 3:36 PM
 */

namespace App\Repositories;


use App\Models\User;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    public function boot()
    {
        $requestCriteria = $this->app->make(RequestCriteria::class);
        $this->pushCriteria($requestCriteria);
    }

}