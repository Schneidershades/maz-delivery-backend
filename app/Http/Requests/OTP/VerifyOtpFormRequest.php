<?php

namespace App\Http\Requests\OTP;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Verify OTP  Form Request Fields",
 *      description="Verify OTP  request body data",
 *      type="object",
 * )
 */

class VerifyOtpFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Otp",
     *      description="Otp received",
     *      example="Otp received"
     * )
     *
     * @var string
     */
    private $otp;

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
            'otp' => 'required',
            'phone' => 'required',
        ];
    }
}
