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

use Illuminate\Support\Facades\Gate;


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

    }

    public function show()
    {
        $collection =  $this->repository->with(['roles'])->paginate();
        return $this->buildCollectionResponse($collection,new UserTransformer());

    }
}