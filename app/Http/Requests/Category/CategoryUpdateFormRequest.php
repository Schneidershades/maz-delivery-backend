<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Category Update Form Request Fields",
 *      description="Category Update request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class CategoryUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Category name",
     *      description="name of the Category",
     *      example="password"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="Vehicle Id",
     *      description="Vehicle Id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $vehicle_id;

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
            'name' => 'required|string|max:255',
            'vehicle_id' => 'required|int|exists:vehicles,id',
        ];
    }
}
