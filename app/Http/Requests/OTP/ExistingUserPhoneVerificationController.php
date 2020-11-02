<?php

namespace App\Http\Requests\OTP;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class ExistingUserPhoneVerificationController extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => [
                'required',
                Rule::exists('users', 'id')->where(function ($builder) {
                    $builder->where('phone', $this->user()->phone);
                })
            ]
        ];
    }
}
