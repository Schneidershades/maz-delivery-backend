<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Address\AddressResource;
use App\Http\Resources\Address\AddressCollection;
use App\Models\User;
use App\Models\City;
use App\Models\State;
use App\Models\Country;

class Address extends Model
{
    use HasFactory;

    public $oneItem = AddressResource::class;
    public $allItems = AddressCollection::class;

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function city()
    {
    	return $this->belongsTo(City::class);
    }

    public function state()
    {
    	return $this->belongsTo(State::class);
    }

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }
}
