<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => UserResource::collection($this->collection),
        ];
    }

    public static function originalAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'first_name' => 'first_name',
            'middle_name' => 'middle_name',
            'last_name' => 'last_name',
            'email' => 'email',
            'title' => 'title',
            'organization_code' => 'organization_code',
            'is_disabled' => 'is_disabled',
            'disable_reason' => 'disable_reason',
            'disabled_at' => 'disabled_at',
            'disabling_user_id' => 'disabling_user_id',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }

     public static function transformedAttribute($index)
    {
        $attribute = [
            'id' => 'id',
            'first_name' => 'first_name',
            'middle_name' => 'middle_name',
            'last_name' => 'last_name',
            'email' => 'email',
            'title' => 'title',
            'organization_code' => 'organization_code',
            'is_disabled' => 'is_disabled',
            'disable_reason' => 'disable_reason',
            'disabled_at' => 'disabled_at',
            'disabling_user_id' => 'disabling_user_id',
        ];

        return isset($attribute[$index]) ? $attribute[$index] : null;
    }
}
