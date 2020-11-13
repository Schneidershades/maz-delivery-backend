<?php

namespace App\Http\Requests\Bank;

use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="Bank Detail Create Form Request Fields",
 *      description="Bank Detail Create request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */
class BankDetailCreateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="Bank title",
     *      description="title of the Bank",
     *      example="password"
     * )
     *
     * @var string
     */
    public $name;
    /**
     * @OA\Property(
     *      title="Bank number",
     *      description="number of the Bank",
     *      example="password"
     * )
     *
     * @var string
     */
    public $number;

    /**
     * @OA\Property(
     *      title="Bank Id",
     *      description="Bank Id",
     *      example="1"
     * )
     *
     * @var int
     */
    public $bank_id;
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
            'number' => 'required|string|max:255',
            'bank_id' => 'required|int|exists:banks,id',
        ];
    }
}
