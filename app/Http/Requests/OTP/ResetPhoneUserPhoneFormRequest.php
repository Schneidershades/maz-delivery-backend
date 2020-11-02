<?php

namespace App\Http\Requests\OTP;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="OTP Phone Number Form Request Fields",
 *      description="OTP Phone Number request body data",
 *      type="object",
 * )
 */

class ResetPhoneUserPhoneFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Phone Number",
     *      description="Phone Number of the user",
     *      example="Phone Number of the user"
     * )
     *
     * @var string
     */
    private $phone;

    /**
     * @OA\Property(
     *      title="Country Code of the user ",
     *      description="Country Code of the user",
     *      example="Country Code of the user"
     * )
     *
     * @var string
     */
    private $code;


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
            'phone' => 'required|unique:users,phone|unique:phone_verifications,phone|string',
            'code' => 'required|exists:country,code',
        ];
    }
}
