<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseAPIInputRequest;
use Illuminate\Foundation\Http\FormRequest;

/**
/**
 * @OA\Schema(
 *      title="Sign in Form Request Fields",
 *      description="sign in request body data",
 *      type="object",
 *      required={"email"}
 * )
 */

class UserLoginFormRequest extends BaseAPIInputRequest
{
    /**
     * @OA\Property(
     *      title="User email",
     *      description="Email of the user",
     *      example="info@scola.com"
     * )
     *
     * @var string
     */
    private $email;

    /**
     * @OA\Property(
     *      title="User password",
     *      description="Password of the user",
     *      example="password"
     * )
     *
     * @var string
     */
    private $password;

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
            'email' => 'required|string|email|max:100',
            'password' => 'required|string|max:100',
        ];
    }
}
