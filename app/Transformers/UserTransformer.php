<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract{

    /**
     * List of resources possible to include
     *
     * @var array
     */
//    protected $defaultIncludes = [
//        'roles'
//    ];

    public function transform(User $user)
    {
        return $user->toArray();
    }

    public  function includeRoles(User $user)
    {
        $roles  = $user->roles()->getResults();
        return $this->collection($roles, new RoleTransformer());
    }
}