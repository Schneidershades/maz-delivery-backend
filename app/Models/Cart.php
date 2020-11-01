<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Cart\CartDetailResource;
use App\Http\Resources\Cart\CartDetailCollection;

class Cart extends Model
{
    use HasFactory;


    public $oneItem = CartResource::class;
    public $allItems = CartCollection::class;
}
