<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Errand Create Form Request Fields",
 *      description="Errand Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class ErrandCreateFormRequest extends FormRequest
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
     *      title="Address Id",
     *      description="Address Id",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $address_id;

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
   *        @OA\Property(property="task", type="object", type="array",
    *            @OA\Items(
    *                @OA\Property(property="name", type="string", example="Go to Market"),
    *                @OA\Property(property="phone", type="string", example="09038449333"),
    *                @OA\Property(property="address", type="string", example="No 5 Gang Street"),
    *                @OA\Property(property="instructions", type="string", example="Please let them"),
    *                @OA\Property(property="date", type="string", example="20-09-2020"),
    *                @OA\Property(property="time", type="string", example="12:30"),
    *            ),
    *        ),
    *    ),
    */    
    public $task;


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

            'task' => 'required|array',
            'task.*.name' => 'required|string',
            'task.*.address' =>'required|string',
            'task.*.instructions' =>'required|string',
            'task.*.phone' =>'required|string',
            'task.*.date' =>'required|date',
            'task.*.time' =>'required',


            'address_id' => 'int|exists:addresses,id',

            'address' => 'array',
            'address.*.name' => 'required|string',
            'address.*.address' =>'required|string',
            'address.*.phone' =>'required|string',
            'address.*.instructions' =>'required|string',
            'address.*.city_id' =>'required|int|exists:cities,id',
            'address.*.save' =>'required|boolean'
        ];
    }
}
