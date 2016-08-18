<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Resource extends Model{

    use SoftDeletes;

    protected $table = 'resource';

    protected $fillable = [

        'name','description','region_code','availability_zone','ami_id',
        'vpc_id','instance_type','security_groups','last_ip_address'
    ];

    protected $appends = [
//        'group_permission'
    ];



}