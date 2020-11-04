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
     *      title="User email",
     *      description="Email of the user",
     *      example="1"
     * )
     *
     * @var integer
     */
    public $service_rates_id;


    /**
   *        @OA\Property(property="task", type="object", type="array",
    *            @OA\Items(
    *                @OA\Property(property="name", type="string", example="Go to Market"),
    *                @OA\Property(property="address", type="string", example="I need Something"),
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
            'task.*.date' =>'required|date',
            'task.*.time' =>'required',
        ];
    }
}
