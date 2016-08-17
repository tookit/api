<?php
/**
 * Created by PhpStorm.
 * User: php-developer
 * Date: 6/3/2016
 * Time: 1:46 PM
 */

namespace App\Http\Controllers;


use App\Models\Role;
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

        $collection =  $this->repository->paginate();
        return $this->buildCollectionResponse($collection,new UserTransformer());

    }


    public function view($id)
    {
        $item = $this->repository->find($id);
        return $this->buildItemResponse($item, New UserTransformer());
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