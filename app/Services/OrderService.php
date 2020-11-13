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

    public function __construct(
        OrderRepositoryInterface $repository
    ) 
    {
        $this->repository = $repository;
    }

    public function register($request, $model, $id = null)
    {
        $order = Order::where('orderable_type', $model->getTable())
                    ->where('orderable_id', $model->id)
                    ->first();

        if($order == null){
            $content = new Order;

            $lastOrder = Order::latest()->first();

            if($lastOrder != null){
                $number = 10000 + $lastOrder->id;
            }else{
                $number = 10000;
            }

            $item = [
                'identifier' => '#ORD'.$number,
                'orderable_id' => $model->id,
                'orderable_type' => $model->getTable()
            ];


            return $rr = $this->repository->requestAndDbIntersection($request, $content, [], $item);

            
        }else{
            $item = [];
            $content = $this->repository->find($order->id);
        }

        // return $rr;

        // $rr = $rr->save();

        // return $rr;
        // return $item = $this->hydrateRequest($request, $model);

        // $item = $item->save();

        // return $item;
    }
    /**
     * @param Request $request
     * @return Order
     */
    protected function hydrateRequest($request, $model)
    {

    }
}