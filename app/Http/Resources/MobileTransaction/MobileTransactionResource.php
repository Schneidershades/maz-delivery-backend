<?php

namespace App\Http\Resources\MobileTransaction;

use Illuminate\Http\Resources\Json\JsonResource;

class MobileTransactionResource extends JsonResource
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
            'type' => $this->type,
            'amount' => $this->amount,
        ];
    }
}
