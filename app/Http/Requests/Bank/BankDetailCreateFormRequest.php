<?php

namespace App\Http\Requests\Bank;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Bank Detail Create Form Request Fields",
 *      description="Bank Detail Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */
class BankDetailCreateFormRequest extends FormRequest
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
