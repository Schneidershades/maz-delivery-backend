<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Category\CategoryCollection;
use App\Models\Vehicle;
use App\Models\LocalDispatch;

class Category extends Model
{
    use HasFactory;

    public $oneItem = CategoryResource::class;
    public $allItems = CategoryCollection::class;

    public function vehicle()
    {
    	return $this->belongsTo(Vehicle::class);
    }

    public function localDispatch()
    {
        return $this->morphMany(LocalDispatch::class, 'local_dispatchable');
    }
}
