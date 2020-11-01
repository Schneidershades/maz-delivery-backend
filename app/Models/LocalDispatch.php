<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\LocalDispatch\LocalDispatchTaskResource;
use App\Http\Resources\LocalDispatch\LocalDispatchTaskCollection;

class LocalDispatch extends Model
{
    use HasFactory;


    public $oneItem = LocalDispatchResource::class;
    public $allItems = LocalDispatchCollection::class;
}
