<?php

namespace App\Observers\Vehicle;

use App\Models\Vehicle;
use Illuminate\Support\Str;

class VehicleObserver
{
    public function creating(Vehicle $vehicle)
    {
        $vehicle->slug = Str::slug($vehicle->type, '_');
    }

    public function updating(Vehicle $vehicle)
    {
        $vehicle->slug = Str::slug($vehicle->type, '_');
    }
}
