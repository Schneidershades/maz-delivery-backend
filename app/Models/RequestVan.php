<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\RequestVan\RequestVanResource;
use App\Http\Resources\RequestVan\RequestVanCollection;
use App\Models\Order;

class RequestVan extends Model
{
    use HasFactory;

    public $oneItem = RequestVanResource::class;
    public $allItems = RequestVanCollection::class;

    public function order()
    {
        return $this->morphMany(Order::class, 'orderable');
    }
}
