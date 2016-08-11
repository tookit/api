<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/3/2016
 * Time: 1:48 PM
 */

namespace App\Transformers;


use App\Models\Role;
use League\Fractal\TransformerAbstract;

class RoleTransformer extends TransformerAbstract {



    public function transform(Role $role)
    {
        return $role->toArray();
    }
}