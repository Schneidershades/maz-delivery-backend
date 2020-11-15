<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Inventory\InventoryTaskResource;
use App\Http\Resources\Inventory\InventoryTaskCollection;
use App\Models\Order;
use App\Models\LocalDispatch;
use App\Models\Category;
use App\Models\User;

class Inventory extends Model
{
    use HasFactory;

    public $oneItem = InventoryResource::class;
    public $allItems = InventoryCollection::class;

    public function order()
    {
        return $this->morphMany(Order::class, 'orderable');
    }

    public function localDispatch()
    {
        return $this->morphMany(LocalDispatch::class, 'local_dispatchable');
    }

    public function serviceRate()
    {
        return $this->belongsTo(ServiceRate::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
