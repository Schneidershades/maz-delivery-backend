<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Order\OrderResource;
use App\Http\Resources\Order\OrderCollection;
use App\Models\Payment;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    public $oneItem = OrderResource::class;
    public $allItems = OrderCollection::class;

    public function payments()
    {
    	return $this->hasMany(Payment::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function dispatch()
    {
    	return $this->belongsTo(User::class, 'dispatch_id');
    }

    public function orderable()
    {
        return $this->morphTo();
    }
}
