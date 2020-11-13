<?php

namespace App\Http\Requests\Address;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Address Update Form Request Fields",
 *      description="Address Update request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */
class AddressUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="User First Name",
     *      description="First name of the user",
     *      example="Nnamdi"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="User Address",
     *      description="Address of the user",
     *      example="No 4 Gang street"
     * )
     *
     * @var string
     */
    public $address;

    /**
     * @OA\Property(
     *      title="User phone",
     *      description="phone of the user",
     *      example="password"
     * )
     *
     * @var string
     */
    public $phone;

    /**
     * @OA\Property(
     *      title="User City",
     *      description="City of the user",
     *      example="1"
     * )
     *
     * @var int
     */
    public $city;
    
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
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'city_id' => 'required|int|exists:cities,id',
        ];
    }
}
