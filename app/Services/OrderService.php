<?php
namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Schema;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderService
{
    public function register($request, $model, $id = null)
    {
        return ($request);

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
        $lastOrder = Order::latest()->first();

        if($lastOrder != null){
            $number = 10000 + $lastOrder ? (int)$lastOrder->id : 0;
        }else{
            $number = 10000;
        }        

        $item = [
            'identifier' => '#ORD'. $number,
            'orderable_id' => $model->id,
            'orderable_type' => $model->getTable()
        ];

        return $this->repository->requestAndDbIntersection($request, $model, [], $item);
    }
}