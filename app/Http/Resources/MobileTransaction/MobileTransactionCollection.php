<?php

namespace App\Http\Resources\MobileTransaction;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MobileTransactionCollection extends ResourceCollection
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
