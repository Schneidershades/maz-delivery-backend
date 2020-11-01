<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Payment\PaymentResource;
use App\Http\Resources\Payment\PaymentCollection;

class Payment extends Model
{
    use HasFactory;

    public $oneItem = PaymentResource::class;
    public $allItems = PaymentCollection::class;
}
