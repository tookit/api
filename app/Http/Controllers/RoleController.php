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
        $item = $this->repository->find($id);
        return $this->buildItemResponse($item, New RoleTransformer());
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|max:255|unique:role',
            'description' => 'max:255',
//            'roles'=>'digits:1',

        ]);
        $item = Role::create($request->input());
        $item->save();
        $permissionsID = $request->input('permissions');
        if($permissionsID){
            $item->permissions()->sync($permissionsID);
        }
        return  response()->json([
            'message'=>'Role created.',
            'data' => $item->toArray()
        ]);

    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:role',
            'description' => 'max:255',
//            'email'=>'required|max:255|unique:user,email,'.$id,
//            'roles'=>'digits:1',

        ]);

        $item = Role::find($id);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->save();
        $permissionsId = $request->input('permissions');
        if($permissionsId){
            $item->permissions()->sync($permissionsId);
        }
        return response()->json(['message'=>'updated']);
    }

    public function destroy()
    {

    }
}