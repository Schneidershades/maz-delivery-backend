<?php
namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderService implements ServiceInterface
{
     /**
     * @var OrderRepositoryInterface
     */
    private $repository;

    public function __construct(OrderRepositoryInterface $repository) 
    {
        $this->repository = $repository;
    }

    public function register($request, $model, $id = null)
    {
        if($id!=null){
            $model = $this->repository->find($id);
        }

        $item = $this->hydrateRequest($request, $model);

        return $this->repository->save($item);
    }
    /**
     * @param Request $request
     * @return Order
     */
    protected function hydrateRequest($request, $model)
    {
        $item = [
            'orderable_id' => $model->id,
            'orderable_type' => $model->getTable()
        ];

        return $this->repository->requestAndDbIntersection($request, $model, [], $item);
    }
}