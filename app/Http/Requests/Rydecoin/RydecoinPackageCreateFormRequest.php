<?php

namespace App\Http\Requests\Rydecoin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Rydecoin Package Create Form Request Fields",
 *      description="Rydecoin Package Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class RydecoinPackageCreateFormRequest extends FormRequest
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
