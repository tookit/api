<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/3/2016
 * Time: 1:46 PM
 */

namespace App\Http\Controllers;


use App\Repositories\UserRepository;
use App\Transformers\UserTransformer;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\User;


class UserController extends Controller {

    /**
     * @var UserRepository
     */
    protected $repository;

    /**

     * @param JobRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
        $requestCriteria =app(RequestCriteria::class);
        $this->repository->pushCriteria($requestCriteria);


    }

    public function show()
    {

        if(Gate::allows('User.Read')){
            $collection =  $this->repository->paginate();
            return $this->buildCollectionResponse($collection,new UserTransformer());
        }


    }


    public function view($id)
    {
        if(!Gate::allows('User.Read')){
            abort(403);
        }
        $item = $this->repository->find($id);
        return $this->buildItemResponse($item, New UserTransformer());
    }

    public function store(Request $request)
    {

        $this->validate($request,[

            'name'=>'required|unique:user|max:60',
            'description'=>'max:255'
        ]);

    }


    public function destroy()
    {

    }
}