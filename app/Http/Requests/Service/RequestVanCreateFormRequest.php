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
     *      title="vehicle Id",
     *      description="vehicle Id",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $vehicle_id;

    

    /**
   *        @OA\Property(property="address", type="object", type="array",
    *            @OA\Items(
    *                @OA\Property(property="name", type="string", example="Go to Market"),
    *                @OA\Property(property="address", type="string", example="No 5 Jesus Street"),
    *                @OA\Property(property="phone", type="string", example="09038449333"),
    *                @OA\Property(property="order_of_movement", type="string", example="1"),
    *                @OA\Property(property="city_id", type="int", example="1"),
    *                @OA\Property(property="save", type="boolean", example="false"),
    *            ),
    *        ),
    *    ),
    */    
    public $address;

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
            'vehicle_id' => 'required|int|exists:vehicles,id',
            'details' => 'required|string',
        ];
    }
}
