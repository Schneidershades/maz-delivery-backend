<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Errand\ErrandResource;
use App\Http\Resources\Errand\ErrandCollection;
use App\Models\Order;
use App\Models\ServiceRate;

class Errand extends Model
{
    use HasFactory;

    public $oneItem = ErrandResource::class;
    public $allItems = ErrandCollection::class;

    public function order()
    {
        return $this->morphMany(Order::class, 'orderable');
    }
    public function serviceRate()
    {
    	return $this->belongsTo(ServiceRate::class);
    }
}
