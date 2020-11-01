<?php

namespace App\Http\Resources\RydecoinPackage;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RydecoinPackageCollection extends ResourceCollection
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
