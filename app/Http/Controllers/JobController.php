<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/3/2016
 * Time: 1:46 PM
 */

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Artifact;
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

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:job',
            'description' => 'max:255',
            'agent_key'=>'required|max:60',
            'scheduler.starts_at'=>'date',
            'scheduler.ends_at'=>'date|afeter:scheduler.ends_at',
            'artifact.shellscript'=>'required',
            'artifact.version'=>'digits'

        ]);
        $item = Job::create($request->input());
        $artifact = Artifact::create($request->input('artifact'));
        $item->artifact()->associate($artifact);
        $item->save();
        return  response()->json([
            'message'=>'Job created.',
            'data' => $item->toArray()
        ]);

    }

    public function destroy($id){



    }
}