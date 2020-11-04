<?php

namespace App\Http\Requests\Rate;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Service Rate Update Form Request Fields",
 *      description="Service Rate Update request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class ServiceRateUpdateFormRequest extends FormRequest
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
