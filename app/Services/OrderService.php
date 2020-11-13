<?php
namespace App\Services;

use App\Models\Order;
use App\Models\ServiceRate;
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

    public function register($request, $outsideModel, $id = null)
    {
        $order = Order::where('orderable_type', $outsideModel->getTable())
                    ->where('orderable_id', $outsideModel->id)
                    ->first();

        if($order == null){
            $order = new Order;
            
        }else{
            $item = [];
            $order = $this->repository->find($order->id);
        }

        $item = $this->hydrateRequest($request, $order, $outsideModel);

        $item->save();

        return $this->repository->find($item->id);
    }
    /**
     * @param Request $request
     * @return Order
     */
    protected function hydrateRequest($request, $order, $outsideModel)
    {
        $lastOrder = Order::latest()->first();

        $rateId = $outsideModel->service_rates_id;

        $serviceItem = ServiceRate::where('id', $rateId)->first();

        $rydecoin = ServiceRate::where('type', 'rydecoin')->first();

        $rydecoinAmount = (int)$serviceItem->rate / (int)$rydecoin->rate;

        if($lastOrder != null){
            $number = 10000 + $lastOrder->id;
        }else{
            $number = 10000;
        }

        $item = [
            'identifier' => '#ORD'.$number,
            'orderable_id' => $outsideModel->id,
            'orderable_type' => $outsideModel->getTable(),
            'rydecoin' => $rydecoinAmount,
            'amount' => $serviceItem->rate,
            'user_id' => auth()->user()->id,
        ];

        return $this->repository->requestAndDbIntersection($request, $order, [], $item);
    }
}