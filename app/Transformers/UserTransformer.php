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
        return [
          'name'    => $user->name,
          'email'    => $user->email,
          'profile'    => $user->profile,
          'roles'    => $this->transformRoles($user->roles)
        ];
    }

    protected function transformRoles($roles)
    {
        $ret = [];
        foreach($roles as $role)
        {
            $ret[] = $role->name;
        }
        return $ret;
    }
//    public  function includeRoles(User $user)
//    {
//        $roles  = $user->roles()->getResults();
//        return $this->collection($roles, new RoleTransformer());
//    }
}