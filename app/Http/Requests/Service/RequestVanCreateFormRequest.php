<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Request Van Create Form Request Fields",
 *      description="Request Van Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class RequestVanCreateFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
