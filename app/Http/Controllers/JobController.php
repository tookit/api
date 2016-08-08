<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/3/2016
 * Time: 1:46 PM
 */

namespace App\Http\Controllers;

use App\Repositories\JobRepository;
use App\Transformers\JobTransformer;
use Illuminate\Support\Facades\Gate;


class JobController extends Controller {

    /**
     * @var JobRepository
     */
    protected $repository;

    /**
     * @param JobRepository $repository
     */
    public function __construct(JobRepository $repository)
    {
//        dd($this->repository->has('artifact'));die();
        $this->repository = $repository;
        $this->repository->with(['artifact']);
//        dd(Gate::allows('User.read'));

    }

    public function show()
    {
        $collection =  $this->repository->paginate(10);
        return $this->buildCollectionResponse($collection,new JobTransformer());

    }
}