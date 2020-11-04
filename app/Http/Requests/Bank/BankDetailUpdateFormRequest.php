<?php

namespace App\Http\Requests\Bank;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Bank Detail Update Form Request Fields",
 *      description="Bank Detail Update request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class BankDetailUpdateFormRequest extends FormRequest
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
