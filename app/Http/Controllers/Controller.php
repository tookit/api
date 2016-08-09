<?php

namespace App\Http\Controllers;

use App\Service\QueryLog;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Laravel\Lumen\Routing\Controller as BaseController;
use League\Fractal\Manager;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\ResourceAbstract;
use League\Fractal\TransformerAbstract;

class Controller extends BaseController
{

    protected $queryLog;



    public function __construct()
    {

    }

    /**
     * @param mixed $item
     * @param /League\Fractal\TransformerAbstract $transformer
     * @param int $status
     * @param array $header
     * @return \Symfony\Component\HttpFoundation\Response
     */

    protected function buildItemResponse($item, TransformerAbstract $transformer,$status = 200,array $header =[])
    {

        $resource = new Item($item,$transformer);
        return $this->buildResourceResponse($resource, $status, $header);

    }

    /**
     * @param LengthAwarePaginator  $collection
     * @param \League\Fractal\TransformerAbstract $transformer
     * @param int $status
     * @param array $header
     */

    protected function buildCollectionResponse($collection, TransformerAbstract $transformer,$status = 200, $header = [])
    {

        $resource = new Collection($collection,$transformer);
//        dd($collection);
        $resource->setPaginator(new IlluminatePaginatorAdapter($collection));
        return $this->buildResourceResponse($resource, $status, $header);
    }

    /**
     * @param \League\Fractal\Resource\ResourceAbstract $resource
     * @param int $status
     * @param array $header
     * @return \Symfony\Component\HttpFoundation\Response
     */
    protected function buildResourceResponse(ResourceAbstract $resource,$status = 200, $header = [])
    {
        $fractal = new Manager();
        $this->queryLog = new QueryLog();
        $response = $this->queryLog->append($fractal->createData($resource)->toArray());
        return response()->json(
//            ?$fractal->createData($resource)->toArray(),
            $response,
            $status,
            $header
        );
    }
}
