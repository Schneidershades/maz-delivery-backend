<?php

namespace App\Http\Resources\Location;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Location\CityResource;

class StateResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,
            'code' => $this->code,
            'cities' => CityResource::collection($this->cities),
        ];
    }
}
