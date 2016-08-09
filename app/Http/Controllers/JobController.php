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
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;

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
        $this->repository = $repository;
        $requestCriteria =app(RequestCriteria::class);
        $this->repository->pushCriteria($requestCriteria);

    }

    public function show()
    {
        $collection =  $this->repository->paginate(10);
        return $this->buildCollectionResponse($collection,new JobTransformer());

    }


    public function view($id)
    {
        $item = $this->repository->find($id);
        return $this->buildItemResponse($item,new JobTransformer());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:10',

        ]);
    }

    public function destroy(){

    }
}