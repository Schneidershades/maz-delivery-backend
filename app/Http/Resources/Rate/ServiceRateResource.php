<?php

namespace App\Http\Resources\Rate;

use Illuminate\Http\Resources\Json\JsonResource;

class ServiceRateResource extends JsonResource
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
            'settingable_id' => $this->settingable_id,
            'settingable_type' => $this->settingable_type,
            'type' => $this->type,
            'rate' => $this->rate,
            'cap_max_rate' => $this->cap_max_rate,
            'cap_min_rate' => $this->cap_min_rate,
            'discount_amount' => $this->discount_amount,
            'discount_percentage' => $this->discount_percentage,
            'cap' => $this->cap,
        ];
    }
}