<?php

namespace App\Http\Resources\Errand;

use Illuminate\Http\Resources\Json\JsonResource;

class ErrandTaskResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'phone' => $this->phone,
            'instructions' => $this->instructions,
            'date' => $this->date,
            'time' => $this->time,
        ];
    }
}
