<?php

namespace App\Http\Requests\Rate;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Service Rate Create Form Request Fields",
 *      description="Service Rate Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class ServiceRateCreateFormRequest extends FormRequest
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
            //
        ];
    }
}
