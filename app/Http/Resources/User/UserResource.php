<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,

            $this->mergeWhen($this->roles->first() != 'user', [
                'permissions' => $this->getAllPermissions()->pluck('name')->map(function($permission){
                    return explode('_', $permission);
                })->toArray(),
            ]),
        ];
    }
}
