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
    protected $availableIncludes = [
        'roles'
    ];

    public function transform(User $user)
    {
        return [
            'id'           => $user->id,
            'name'        => $user->name,
            'email'      => $user->email,
            'created_at'   => $user->created_at,
            'updated_at'   => $user->updated_at,
        ];
    }
}