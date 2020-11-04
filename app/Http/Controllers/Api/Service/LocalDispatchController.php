<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\LocalDispatch;
use App\Service\OrderService;

class LocalDispatchController extends ApiController
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }
    
    /**
    * @OA\Get(
    *      path="/api/v1/local-dispatch",
    *      operationId="localDispatchLists",
    *      tags={"localDispatch"},
    *      summary="Get All LocalDispatch",
    *      description="Get All LocalDispatch",
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
        return $this->showAll(LocalDispatch::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/local-dispatch",
    *      operationId="localDispatchCreate",
    *      tags={"localDispatch"},
    *      summary="Post New LocalDispatch",
    *      description="Post New LocalDispatch",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/LocalDispatchCreateFormRequest")
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
    public function store(LocalDispatchCreateFormRequest $request)
    {
    	$model = new LocalDispatch;
    	$model = $this->requestAndDbIntersection($request, $model);
        $model = $model->save();
        $model = $this->service->register($request, $model);
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/local-dispatch/{id}",
    *      operationId="localDispatchDetails",
    *      tags={"localDispatch"},
    *      summary="Show an LocalDispatch",
    *      description="Show an LocalDispatch",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="LocalDispatch ID",
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
        return $this->showOne(LocalDispatch::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/local-dispatch/{id}",
    *      operationId="localDispatchUpdate",
    *      tags={"localDispatch"},
    *      summary="Update an LocalDispatch",
    *      description="Update an LocalDispatch",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="LocalDispatch ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/LocalDispatchUpdateFormRequest")
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

    public function update(LocalDispatchUpdateFormRequest $request, $id)
    {
        $model = LocalDispatch::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
        $model = $model->save();
        $model = $this->service->register($request, $model, $id);
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/local-dispatch/{id}",
    *      operationId="localDispatchDelete",
    *      tags={"localDispatch"},
    *      summary="Delete an LocalDispatch",
    *      description="Delete an LocalDispatch",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="LocalDispatch ID",
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
        $model = LocalDispatch::find($id)->delete();
        return $this->showMessage('LocalDispatch Deleted');
    }
}
