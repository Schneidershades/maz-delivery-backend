<?php

namespace App\Http\Resources\LocalDispatch;

use Illuminate\Http\Resources\Json\JsonResource;

class LocalDispatchResource extends JsonResource
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
            'user' => $this->user,
            'category' => $this->category,
            'local_dispatable_id' => $this->local_dispatable_id,
            'local_dispatable_type' => $this->local_dispatable_type,
            'quantity' => $this->quantity,
            'weight' => $this->weight,
            'note' => $this->note,
            'instructions' => $this->instructions,
            'date' => $this->date,
            'time' => $this->time,
            'instant' => $this->instant,
        ];
    }
}
