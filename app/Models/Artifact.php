<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Artifact extends Model{


    public $timestamps = false;

    protected $table = 'job_artifact';

    protected $fillabe = [];


    public function job()
    {
        return $this->hasOne('App\Models\Job','artifact_id');
    }

    public function getShellscriptAttribute($value)
    {
        return base64_decode($value);
    }
}