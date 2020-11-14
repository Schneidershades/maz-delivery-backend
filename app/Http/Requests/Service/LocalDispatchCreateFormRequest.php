<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Local Dispatch Create Form Request Fields",
 *      description="Local Dispatch Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class LocalDispatchCreateFormRequest extends FormRequest
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
     *      title="local_dispatable Id",
     *      description="local_dispatable Id",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $local_dispatable_id;

    /**
     * @OA\Property(
     *      title="local_dispatable type",
     *      description="local_dispatable type",
     *      example="category/inventory"
     * )
     *
     * @var integer
     */
    public $local_dispatable_type;

    /**
     * @OA\Property(
     *      title="quantity ",
     *      description="quantity ",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $quantity;

    /**
     * @OA\Property(
     *      title="weight ",
     *      description="weight ",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $weight;

    /**
     * @OA\Property(
     *      title="note",
     *      description="note",
     *      example="1"
     * )
     *
     * @var string
     */
    public $note;

    /**
     * @OA\Property(
     *      title="instruction",
     *      description="instruction",
     *      example="1"
     * )
     *
     * @var string
     */
    public $instruction;

    /**
     * @OA\Property(
     *      title="date",
     *      description="date",
     *      example="1"
     * )
     *
     * @var string
     */
    public $date;

    /**
     * @OA\Property(
     *      title="time",
     *      description="time",
     *      example="1"
     * )
     *
     * @var string
     */
    public $time;



    /**
     * @OA\Property(
     *      title="instant",
     *      description="instant",
     *      example="false"
     * )
     *
     * @var boolean
     */
    public $instant;

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
            'local_dispatable_id' => 'required|int',
            'local_dispatable_type' => 'required|string',
            'quantity' => 'required|int',
            'weight' => 'required|int',
            'note' => 'required|string',
            'instructions' => 'required|string',
            'date' => 'required|string',
            'time' => 'required|string',
            'instant' => 'required|boolean',


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
