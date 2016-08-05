<?php
/**
 * Created by PhpStorm.
 * User: xiangyuwang
 * Date: 7/22/16
 * Time: 9:38 PM
 */

namespace App\Service;


use Illuminate\Support\Facades\DB;

class QueryLog
{

    public function __construct()
    {

    }

    public function append(array $data)
    {
        if($this->isEnabled())
        {
            if(! isset($data['meta']))
            {
                $data['meta'] = [];

            }
            $time = 0;
            $queries = $this->getQueryLog();

            foreach ($queries as $query)
            {
                $time  = array_get($query,'time',0);

            }

            $data['meta']['queries'] = [
                'count'=> count($queries),
                'time'=>$time,
                'log'=>$queries
            ];
        }

        return $data;
    }

    protected function getQueryLog()
    {
        $queries = [];

        foreach(\DB::getQueryLog() as $query)
        {
            $queryString  = array_get($query,'query');
            $bindings = array_get($query,'bindings');
            $time = array_get($query,'time');

            $queries[] = [

                'query' => vsprintf(str_replace('?', '%s',$queryString),$bindings),
                'time' => $time
            ];
        }

        return $queries;

    }

    protected function isEnabled()
    {
        return true;
    }

}