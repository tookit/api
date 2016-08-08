<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model{

    use SoftDeletes;

    protected $table = 'job';

    protected $fillable = [

        'agent_key','name','description'
    ];


    public function scheduler(){

        return $this->hasOne('App\Models\Scheduler');
    }


    public function artifact(){

        return $this->hasOne('App\Models\Artifact');
    }
}