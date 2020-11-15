<?php

namespace App\Http\Resources\RydecoinPackage;

use Illuminate\Http\Resources\Json\JsonResource;

class RydecoinPackageResource extends JsonResource
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
            'rydecoin' => $this->rydecoin,
            'amount' => $this->amount,
            'percentage' => $this->percentage,
        ];
    }
}