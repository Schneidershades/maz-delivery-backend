<?php

namespace App\Http\Requests\Service;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Mobile Transaction Create Form Request Fields",
 *      description="Mobile Transaction Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class MobileTransactionCreateFormRequest extends FormRequest
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
     *      title="Bank Details Id",
     *      description="Bank Details Id",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $bank_detail_id;

    /**
   *        @OA\Property(property="bank_details", type="object", type="array",
    *            @OA\Items(
    *                @OA\Property(property="bank_id", type="int", example="1"),
    *                @OA\Property(property="name", type="string", example="Oshie Ven"),
    *                @OA\Property(property="number", type="string", example="09038449333"),
    *                @OA\Property(property="save", type="boolean", example="false"),
    *            ),
    *        ),
    *    ),
    */    
    public $bank_details;


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
            'rate' => 'required|numeric',
            'charge' => 'required|numeric',
            'type' => 'required|string',


            'bank_detail_id' => 'int|exists:bank_details,id',

            'bank_detail' => 'array',
            'bank_detail.*.bank_id' => 'required|exists:bank_details,id',
            'bank_detail.*.name' =>'required|string',
            'bank_detail.*.number' =>'required|string',
            'bank_detail.*.save' =>'required|boolean'


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
