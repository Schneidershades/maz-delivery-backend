<?php

namespace App\Http\Resources\Order;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'user' => $this->user,
            'amount' => $this->amount,
            'rydecoin' => $this->rydecoin,
            'orderable_id' => $this->orderable_id,
            'orderable_type' => $this->orderable_type,
            'dispatch_id' => $this->dispatch_id,
            'dispatch_status' => $this->dispatch_status,
            'payment_status' => $this->payment_status,
            'note' => $this->note,
            'rating' => $this->rating,
            'user_comment' => $this->user_comment,
            'dispatch_comment' => $this->dispatch_comment,
            'demurrage' => $this->demurrage,
            'demurrage_timeout' => $this->demurrage_timeout,
            'false' => $this->false,
        ];
    }
}