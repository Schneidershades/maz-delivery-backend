<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Vehicle\VehicleResource;
use App\Http\Resources\Vehicle\VehicleCollection;


class Vehicle extends Model
{
    use HasFactory;

    public $oneItem = VehicleResource::class;
    public $allItems = VehicleCollection::class;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

}
