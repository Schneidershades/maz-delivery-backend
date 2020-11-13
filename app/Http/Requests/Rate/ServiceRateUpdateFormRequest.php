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
     * @OA\Property(
     *      title="Model Id",
     *      description="Model Id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $settingable_id;



    /**
     * @OA\Property(
     *      title="Model type",
     *      description="Model type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $settingable_id;
    /**
     * @OA\Property(
     *      title="type",
     *      description="type",
     *      example="1"
     * )
     *
     * @var string
     */
    public $type;

    /**
     * @OA\Property(
     *      title="rate",
     *      description="rate",
     *      example="1"
     * )
     *
     * @var int
     */
    public $rate;

    /**
     * @OA\Property(
     *      title="cap_max_rate",
     *      description="cap_max_rate",
     *      example="1"
     * )
     *
     * @var int
     */
    public $cap_max_rate;

    /**
     * @OA\Property(
     *      title="cap_min_rate",
     *      description="cap_min_rate",
     *      example="1"
     * )
     *
     * @var int
     */
    public $cap_min_rate;

    /**
     * @OA\Property(
     *      title="discount_amount",
     *      description="discount_amount",
     *      example="1"
     * )
     *
     * @var int
     */
    public $discount_amount;

    /**
     * @OA\Property(
     *      title="discount_percentage",
     *      description="discount_percentage",
     *      example="1"
     * )
     *
     * @var int
     */
    public $discount_percentage;

    /**
     * @OA\Property(
     *      title="cap",
     *      description="cap",
     *      example="1"
     * )
     *
     * @var int
     */
    public $cap;

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
            'settingable_id' => 'required|int',
            'settingable_type' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'rate' => 'required|numeric',
            'cap_max_rate' => 'required|numeric',
            'cap_min_rate' => 'required|numeric',
            'discount_amount' => 'required|numeric',
            'discount_percentage' => 'required|numeric',
            'cap' => 'required|numeric',
        ];
    }
}
