<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements
    AuthenticatableContract,
    AuthorizableContract
{
    use Authenticatable, Authorizable;
    use SoftDeletes;


    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];


    protected $appends = [
      'group_membership'
    ];
    protected $dates = ['deleted_at'];


    public function roles()
    {

        return $this->belongsToMany('App\Models\Role','role_user','user_id','role_id');

    }

    /**
     * @return Collection
     */
    public function getGroupMembershipAttribute()
    {
        return $this->roles->lists('name');
    }


    public function getRolePermissonsAttribute()
    {

    }

    public function hasRole(array $roles)
    {
        $collection = collect($roles);

        $intersect = $collection->intersect($this->getGroupMembershipAttribute());

        return ($intersect->isEmpty()) ? false : true;

    }

    public function hasPermission($permission)
    {
        foreach($this->roles as $role)
        {
            if($role->getGroupPermissionAttribute()->contains($permission))
            {
                return true;
            }
        }
        return false;
    }

}
