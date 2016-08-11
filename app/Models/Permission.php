<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Permission extends Model{

    use SoftDeletes;

    protected $table = 'permission';

    protected $fillable = [

        'name','description','method','controller','action'
    ];


    public function roles(){

        return $this->belongsToMany('App\Models\Role','role_permission','permission_id','role_id');

    }


}