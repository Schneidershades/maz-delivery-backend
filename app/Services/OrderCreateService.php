<?php


namespace App\Services;

use App\Models\Order;
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

    public function register($request)
    {
        $job = $this->hydrateRequest($request);

        return $this->repository->save($job);
    }
    /**
     * @param Request $request
     * @return Order
     */
    protected function hydrateRequest($request)
    {
        $model = new Order;

        return $this->repository->requestAndDbIntersection($request, $model);
    }
}