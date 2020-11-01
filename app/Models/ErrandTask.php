<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Errand\ErrandTaskResource;
use App\Http\Resources\Errand\ErrandTaskCollection;

class ErrandTask extends Model
{
    use HasFactory;

    public $oneItem = ErrandResource::class;
    public $allItems = ErrandCollection::class;
}
