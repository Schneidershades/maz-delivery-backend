<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Traits\Api\ApiResponder;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Schema;

class ApiController extends Controller
{
    use ApiResponder;

    public function getColumns($table)
    {       
        $columns = Schema::getColumnListing($table);
        return $columns;
    }

    public function requestAndDbIntersection($request, $model, array $excludeFieldsForLogic = []){
        $requestColumns = array_keys($request->all());

        $model = $model;

        $tableColumns = $this->getColumns($model->getTable());

        $fields = array_intersect($requestColumns, $tableColumns);

        foreach($fields as $field){
            $model->setAttribute($field, $request[$field]);
        }

        return $model;
    }

    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="ScolaLMS CBT Examiner API",
     *      description="ScolaLMS CBT Examiner project",
     *      @OA\Contact(
     *          email="info@hasob.ng"
     *      ),
     *      @OA\License(
     *          name="Proprietary",
     *          url="http://www.scola.ng"
     *      )
     * )
     *
     *
     * @OA\Tag(
     *     name="ScolaLMS CBT Examiner",
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
