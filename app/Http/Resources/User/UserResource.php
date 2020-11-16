<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Bank\BankDetailResource;
use App\Http\Resources\Address\AddressResource;
use App\Http\Resources\Wallet\WalletResource;

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
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'lat' => $this->lat,
            'lng' => $this->lng,
            'city_id' => $this->city_id,
            'state_id' => $this->state_id,
            'country_id' => $this->country_id,
            'type' => $this->type,
            'staff_id' => $this->staff_id,
            'staff_type' => $this->staff_type,
            'staff_vehicle_id' => $this->staff_vehicle_id,
            'active' => $this->active,
            'api' => $this->api,
            'notification' => $this->notification,

            'bankDetails' => BankDetailResource::collection($this->bankDetails),
            'addresses' => AddressResource::collection($this->addresses),
            'wallet' => $this->wallet,

            $this->mergeWhen($this->roles->first() != 'user', [
                'permissions' => $this->getAllPermissions()->pluck('name')->map(function($permission){
                    return explode('_', $permission);
                })->toArray(),
            ]),
        ];
    }
}