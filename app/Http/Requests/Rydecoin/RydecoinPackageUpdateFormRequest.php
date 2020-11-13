<?php

namespace App\Http\Requests\Rydecoin;

use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Rydecoin Package Update Form Request Fields",
 *      description="Rydecoin Package Update request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class RydecoinPackageUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="name",
     *      example="1"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="rydecoin",
     *      description="rydecoin",
     *      example="1"
     * )
     *
     * @var int
     */
    public $rydecoin;


    /**
     * @OA\Property(
     *      title="amount",
     *      description="amount",
     *      example="1"
     * )
     *
     * @var int
     */
    public $amount;

    /**
     * @OA\Property(
     *      title="percentage",
     *      description="percentage",
     *      example="1"
     * )
     *
     * @var int
     */
    public $percentage;

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
            'amount' => 'required|numeric',
            'rydecoin' => 'required|numeric',
            'percentage' => 'required|numeric',
        ];
    }
}
