<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\RequestVan;
use App\Service\OrderService;

class RequestVanController extends ApiController
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }
    /**
    * @OA\Get(
    *      path="/api/v1/request-van",
    *      operationId="requestVanLists",
    *      tags={"requestVan"},
    *      summary="Get All RequestVan",
    *      description="Get All RequestVan",
    *      @OA\Response(
    *          response=200,
    *          description="Successful",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */

    public function index()
    {        
        return $this->showAll(RequestVan::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/request-van",
    *      operationId="requestVanCreate",
    *      tags={"requestVan"},
    *      summary="Post New RequestVan",
    *      description="Post New RequestVan",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/RequestVanCreateFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function store(RequestVanCreateFormRequest $request)
    {
    	$model = new RequestVan;
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        $model = $this->service->register($request, $model);
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/request-van/{id}",
    *      operationId="requestVanDetails",
    *      tags={"requestVan"},
    *      summary="Show an RequestVan",
    *      description="Show an RequestVan",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="RequestVan ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      
    *      @OA\Response(
    *          response=200,
    *          description="Successful",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */

    public function show($id)
    {
        return $this->showOne(RequestVan::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/request-van/{id}",
    *      operationId="requestVanUpdate",
    *      tags={"requestVan"},
    *      summary="Update an RequestVan",
    *      description="Update an RequestVan",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="RequestVan ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/RequestVanUpdateFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */

    public function update(RequestVanUpdateFormRequest $request, $id)
    {
        $model = RequestVan::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        $model = $this->service->register($request, $model, $id);
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/request-van/{id}",
    *      operationId="requestVanDelete",
    *      tags={"requestVan"},
    *      summary="Delete an RequestVan",
    *      description="Delete an RequestVan",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="RequestVan ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    *      @OA\Response(
    *          response=400,
    *          description="Bad Request"
    *      ),
    *      @OA\Response(
    *          response=401,
    *          description="Unauthenticated",
    *      ),
    *      @OA\Response(
    *          response=403,
    *          description="Forbidden"
    *      ),
    *      security={ {"bearerAuth": {}} },
    * )
    */
    public function destroy($id)
    {
        $model = RequestVan::find($id)->delete();
        return $this->showMessage('RequestVan Deleted');
    }
}
