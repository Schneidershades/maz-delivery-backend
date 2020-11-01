<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseAPIInputRequest;
use Illuminate\Foundation\Http\FormRequest;
/**
/**
 * @OA\Schema(
 *      title="User Update Form Request Fields",
 *      description="User Update request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class UserUpdateFormRequest extends FormRequest
{
    /**
     * @OA\Property(
     *      title="User First Name",
     *      description="First name of the user",
     *      example="Shehu"
     * )
     *
     * @var string
     */
    public $first_name;

    /**
     * @OA\Property(
     *      title="User Middle Name",
     *      description="Middle name of the user",
     *      example="Sokoto"
     * )
     *
     * @var string
     */
    public $middle_name;

    /**
     * @OA\Property(
     *      title="User Last Name",
     *      description="Last name of the user",
     *      example="Shagari"
     * )
     *
     * @var string
     */
    public $last_name;

    /**
     * @OA\Property(
     *      title="User email",
     *      description="Email of the user",
     *      example="shehu@shagari.ng"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="User Password",
     *      description="Password of the user",
     *      example="password"
     * )
     *
     * @var string
     */
    public $password; 



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
            'first_name' => 'required|string|max:255',
            'middle_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ];
    }
}
