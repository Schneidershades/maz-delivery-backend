<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;


/**
/**
 * @OA\Schema(
 *      title="Inventory Update Form Request Fields",
 *      description="Inventory Update request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class InventoryUpdateFormRequest extends FormRequest
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
