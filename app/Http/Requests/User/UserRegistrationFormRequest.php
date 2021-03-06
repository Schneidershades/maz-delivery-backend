<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseAPIInputRequest;
use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Sign Up Form Request Fields",
 *      description="sign up request body data",
 *      type="object",
 *      required={"first_name"}
 * )
 */

class UserRegistrationFormRequest extends FormRequest
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
     *      title="User email",
     *      description="Email of the user",
     *      example="nnamdi@azikiwe.ng"
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ];
    }
}
