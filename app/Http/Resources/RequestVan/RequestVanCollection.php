<?php

namespace App\Http\Resources\RequestVan;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RequestVanCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
