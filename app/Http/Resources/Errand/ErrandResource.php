<?php

namespace App\Http\Resources\Errand;

use Illuminate\Http\Resources\Json\JsonResource;

class ErrandResource extends JsonResource
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
            'identifier' => $this->identifier,
            'service_rates_id' => $this->service_rates_id,
        ];
    }
}
