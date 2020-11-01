<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LocalDispatch extends Model
{
    use HasFactory;


    public $oneItem = LocalDispatchResource::class;
    public $allItems = LocalDispatchCollection::class;
}
