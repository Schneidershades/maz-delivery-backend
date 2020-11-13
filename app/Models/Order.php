<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Order\OrderCollection;
use App\Models\Payment;

class Order extends Model
{
    use HasFactory;

    public $oneItem = OrderResource::class;
    public $allItems = OrderCollection::class;

    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }
}
