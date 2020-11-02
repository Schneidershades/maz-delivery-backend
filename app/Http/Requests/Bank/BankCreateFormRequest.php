<?php

namespace App\Http\Requests\Bank;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Bank Create Form Request Fields",
 *      description="Bank Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */
class BankCreateFormRequest extends FormRequest
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
