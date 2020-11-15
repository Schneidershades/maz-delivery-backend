<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\MobileTransaction\MobileTransactionResource;
use App\Http\Resources\MobileTransaction\MobileTransactionCollection;
use App\Models\Order;

class MobileTransaction extends Model
{
    use HasFactory;

    public $oneItem = MobileTransactionResource::class;
    public $allItems = MobileTransactionCollection::class;

    public function order()
    {
        return $this->morphMany(Order::class, 'orderable');
    }
    public function serviceRate()
    {
    	return $this->belongsTo(ServiceRate::class);
    }
}
