<?php

namespace App\Http\Resources\RequestVan;

use Illuminate\Http\Resources\Json\JsonResource;

class RequestVanResource extends JsonResource
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
            'id' => $this->id,
            'service_rates_id' => $this->service_rates_id,
            'vehicle' => $this->vehicle,
            'details' => $this->details,
        ];
    }
}
