<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\Api\ApiResponder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class ApiController extends Controller
{
    use ApiResponder;

    public function requestAndDbIntersection($request, $model, array $excludeFieldsForLogic = [], array $includeFields = [])
    {
        $excludeColumns = array_diff($request->all(), $excludeFieldsForLogic);
        
        $allReadyColumns = array_merge($excludeColumns, $includeFields);

        $requestColumns = array_keys($allReadyColumns);

        $tableColumns = $this->getColumns($model->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $model->setAttribute($field, $allReadyColumns[$field]);
        }

        return $model;
    }

    // public function requestAndDbIntersection($request, $model, array $excludeFieldsForLogic = []){
    //     $requestColumns = array_keys($request->all());

    //     $model = $model;

    //     $tableColumns = $this->getColumns($model->getTable());

    //     $fields = array_intersect($requestColumns, $tableColumns);

    //     foreach($fields as $field){
    //         $model->setAttribute($field, $request[$field]);
    //     }

    //     return $model;
    // }

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Maz Delivery API",
     *      description="Maz Delivery project",
     *      @OA\Contact(
     *          email="info@mazdelivery.com"
     *      ),
     *      @OA\License(
     *          name="Proprietary",
     *          url="http://www.mazdelivery.com"
     *      )
     * )
     *
     *
     * @OA\Tag(
     *     name="Maz Delivery API",
     *     description="API Endpoints"
     * )
     *
     *  @OA\SecurityScheme(
     *     securityScheme="bearerAuth",
     *     type="http",
     *     scheme="bearer"
     * )
     *
     */
}
