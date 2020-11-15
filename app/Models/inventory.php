<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Inventory\InventoryTaskResource;
use App\Http\Resources\Inventory\InventoryTaskCollection;
use App\Models\Order;

class Inventory extends Model
{
    use HasFactory;

    public $oneItem = InventoryResource::class;
    public $allItems = InventoryCollection::class;

    public function order()
    {
        return $this->morphMany(Order::class, 'orderable');
    }
}
