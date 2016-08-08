<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scheduler extends Model{

    use SoftDeletes;

    public $timestamps = false;

    protected $table = 'job_scheduler';

    protected $fillabel = [];

    /*
     * relations
     */
    public function job(){

        return $this->hasOne('App\Models\Job','scheduler_id');
    }

}