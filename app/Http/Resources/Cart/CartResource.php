<?php

namespace App\Http\Resources\Cart;

use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
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
            'order_of_movement' => $this->order_of_movement,
            'status' => $this->status,
            'cartable_id' => $this->cartable_id,
            'cartable_type' => $this->cartable_type,
        ];
    }
}