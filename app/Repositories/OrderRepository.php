<?php

namespace App\Repositories;

use App\Models\Order;
use App\Repositories\Interfaces\OrderRepositoryInterface;

class OrderRepository extends AbstractRepository implements OrderRepositoryInterface
{
    public function __construct()
    {
        parent::__construct(Order::class);
    }

	public function findModelById($id)
	{
		return Order::where('id', $id)->first();
	}

    public function pendingOrders()
    {
        return Order::where('status', 'pending')->latest()->get();
    }
}