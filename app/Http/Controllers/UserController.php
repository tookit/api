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
}