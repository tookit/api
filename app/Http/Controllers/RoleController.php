<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/3/2016
 * Time: 1:46 PM
 */

namespace App\Http\Controllers;


use App\Repositories\RoleRepository;
use App\Transformers\RoleTransformer;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\Models\Role;


class RoleController extends Controller {

    /**
     * @var RoleRepository
     */
    protected $repository;

    /**

     * @param RoleRepository $repository
     */
    public function __construct(RoleRepository $repository)
    {
        $this->repository = $repository;
        $requestCriteria =app(RequestCriteria::class);
        $this->repository->pushCriteria($requestCriteria);


    }

    public function show()
    {

        $collection =  $this->repository->paginate();
        return $this->buildCollectionResponse($collection,new RoleTransformer());


    }


    public function view($id)
    {
        if(!Gate::allows('Role.Read')){
            abort(403);
        }
        $item = $this->repository->find($id);
        return $this->buildItemResponse($item, New RoleTransformer());
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