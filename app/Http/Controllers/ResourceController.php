<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/3/2016
 * Time: 1:46 PM
 */

namespace App\Http\Controllers;


use App\Repositories\ResourceRepository;
use App\Transformers\ResourceTransformer;
use Prettus\Repository\Criteria\RequestCriteria;
use Illuminate\Http\Request;


class ResourceController extends Controller {

    /**
     * @var ResourceRepository
     */
    protected $repository;

    /**

     * @param ResourceRepository $repository
     */
    public function __construct(ResourceRepository $repository)
    {
        $this->repository = $repository;
        $requestCriteria =app(RequestCriteria::class);
        $this->repository->pushCriteria($requestCriteria);


    }

    public function show()
    {

        $collection =  $this->repository->paginate();
        return $this->buildCollectionResponse($collection,new ResourceTransformer());

    }


    public function view($id)
    {
        $item = $this->repository->find($id);
        return $this->buildItemResponse($item, New ResourceTransformer());
    }



    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:user',
            'description' => 'max:255',
            'email'=>'required|max:255|unique:user',
//            'roles'=>'digits:1',

        ]);
        $item = User::create($request->input());
        $item->save();
        $rolesId = $request->input('roles');
        if($rolesId){
            $item->roles()->attach($rolesId);
        }
        return  response()->json([
            'message'=>'User created.',
            'data' => $item->toArray()
        ]);

    }


    public function update(Request $request,$id){
        $this->validate($request, [
            'name' => 'required|max:255|unique:user',
            'description' => 'max:255',
            'email'=>'required|max:255|unique:user,email,'.$id,
//            'roles'=>'digits:1',

        ]);

        $item = User::find($id);
        $item->name = $request->input('name');
        $item->email = $request->input('email');
        $item->save();
        $rolesId = $request->input('roles');
        if($rolesId){
            $item->roles()->sync($rolesId);
        }
        return response()->json(['message'=>'updated']);
    }

    public function destroy()
    {

    }
}