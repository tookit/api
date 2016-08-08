<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 7/7/2016
 * Time: 3:36 PM
 */

namespace App\Repositories;


use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository {


    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        // TODO: Implement model() method.

        return User::class;
    }
}