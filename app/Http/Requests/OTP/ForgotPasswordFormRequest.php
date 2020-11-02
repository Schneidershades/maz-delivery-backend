<?php

namespace App\Http\Requests\OTP;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Forgot Password OTP Phone Number Form Request Fields",
 *      description="Forgot Password OTP Phone Number request body data",
 *      type="object",
 * )
 */

class ForgotPasswordFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Phone Number",
     *      description="Phone Number of the new user",
     *      example="Phone Number of the new user"
     * )
     *
     * @var string
     */
    private $phone;

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
            'phone' => 'required|string',
            // 'code' => [
            //     'required',
            //     'exists:country,code'
            // ],
        ];
    }
}
