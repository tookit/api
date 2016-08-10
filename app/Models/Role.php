<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model{

    use SoftDeletes;

    protected $table = 'role';

    protected $fillable = [

        'name','description'
    ];


    public function users(){

        return $this->belongsToMany('App\Models\User','role_user','role_id','user_id');
    }


    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission','role_permission','role_id','user_id');
    }

}