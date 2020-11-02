<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;

class ServiceRateController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/service-rate",
    *      operationId="ServiceRateLists",
    *      tags={"ServiceRate"},
    *      summary="Get All ServiceRate",
    *      description="Get All ServiceRate",
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
        return $this->showAll(ServiceRate::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/service-rate",
    *      operationId="ServiceRateCreate",
    *      tags={"ServiceRate"},
    *      summary="Post New ServiceRate",
    *      description="Post New ServiceRate",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ServiceRateCreateFormRequest")
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
    public function store(ServiceRateCreateFormRequest $request)
    {
    	$model = new ServiceRate;
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/service-rate/{id}",
    *      operationId="ServiceRateDetails",
    *      tags={"ServiceRate"},
    *      summary="Show an ServiceRate",
    *      description="Show an ServiceRate",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ServiceRate ID",
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
        return $this->showOne(ServiceRate::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/service-rate/{id}",
    *      operationId="ServiceRateUpdate",
    *      tags={"ServiceRate"},
    *      summary="Update an ServiceRate",
    *      description="Update an ServiceRate",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ServiceRate ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ServiceRateUpdateFormRequest")
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

    public function update(ServiceRateUpdateFormRequest $request, $id)
    {
        $model = ServiceRate::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/service-rate/{id}",
    *      operationId="ServiceRateDelete",
    *      tags={"ServiceRate"},
    *      summary="Delete an ServiceRate",
    *      description="Delete an ServiceRate",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="ServiceRate ID",
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
        $model = ServiceRate::find($id)->delete();
        return $this->showMessage('ServiceRate Deleted');
    }
}

