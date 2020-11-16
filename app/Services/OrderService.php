<?php
namespace App\Services;

use App\Models\Order;
use App\Models\ServiceRate;
use App\Models\ErrandTask;
use App\Models\Address;
use App\Models\Cart;
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


        $item = $this->repository->find($item->id);

        $this->other($request, $item);

        return $item;

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
        ];

        return $this->repository->requestAndDbIntersection($request, $order, [], $item);
    }

    protected function other($request, $order)
    {
        if($request->has('task')){
            foreach($request['task'] as $task){

                $orderContent = [
                    'orderable_id' => $order->id,
                ];

                $newtask = new ErrandTask;
                $newtask = $this->repository->contentAndDbIntersection($task, $newtask, [], $orderContent);
                $newtask->save();
            }
            
        }

        if($request->has('address')){
            foreach($request['address'] as $address){

                if(array_key_exists('address_id', $address)){
                    $add = Address::find($address['address_id']);

                    $cart = new Cart;

                    $orderContent = [
                        'order_id' => $order->id,
                        'cartable_id' => $order->id,
                        'cartable_type' => $add->getTable(),
                        'order_of_movement' => $address['order_of_movement'],
                    ];


                    $ad = $this->repository->contentAndDbIntersection($address, $cart, [], $orderContent);
                    $ad->save();

                }else{
                    $add = new Address;
                    $add = $this->repository->contentAndDbIntersection($address, $add);
                    $add->save();

                    $cart = new Cart;

                    $orderContent = [
                        'order_id' => $order->id,
                        'cartable_id' => $order->id,
                        'cartable_type' => $add->getTable(),
                        'order_of_movement' => $address['order_of_movement'],
                    ];

                    $ad = $this->repository->contentAndDbIntersection($address, $cart, [], $orderContent);
                    $ad->save();
                }    
            } 
        }
    }
}