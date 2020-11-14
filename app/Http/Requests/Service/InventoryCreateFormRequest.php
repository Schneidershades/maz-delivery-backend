<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Inventory Create Form Request Fields",
 *      description="Inventory Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class InventoryCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Service Rate Id",
     *      description="Service Rate Id",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $service_rates_id;

    /**
     * @OA\Property(
     *      title="Category Id",
     *      description="Category Id",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $category_id;

    /**
     * @OA\Property(
     *      title="name",
     *      description="name",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $name;

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
            'service_rates_id' => 'required|int|exists:service_rates,id',
            'category_id' => 'required|int|exists:categories,id',
            'name' => 'required|string',
        ];
    }
}
