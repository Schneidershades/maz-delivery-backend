<?php


namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderCreateService implements ServiceInterface
{
     /**
     * @var OrderRepositoryInterface
     */
    private $repository;

    public function __construct(OrderRepositoryInterface $repository) 
    {
        $this->repository = $repository;
    }

    public function register($request, $model)
    {
        $item = $this->hydrateRequest($request, $model);

        return $this->repository->save($item);
    }
    /**
     * @param Request $request
     * @return Order
     */
    protected function hydrateRequest($request, $model)
    {
        return $this->repository->requestAndDbIntersection($request, $model);
    }
}