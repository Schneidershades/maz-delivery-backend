<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Rate\ServiceRateResource;
use App\Http\Resources\Rate\ServiceRateCollection;

class ServiceRate extends Model
{
    use HasFactory;

    public $oneItem = ServiceRateResource::class;
    public $allItems = ServiceRateCollection::class;
}
