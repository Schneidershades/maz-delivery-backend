<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Service\OrderService;

class InventoryController extends ApiController
{
    private $service;

    public function __construct(OrderCreateService $service)
    {
        $this->service = $service;
    }

    /**
    * @OA\Get(
    *      path="/api/v1/inventory",
    *      operationId="inventoryLists",
    *      tags={"inventory"},
    *      summary="Get All Inventory",
    *      description="Get All Inventory",
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
        return $this->showAll(Inventory::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/inventory",
    *      operationId="inventoryCreate",
    *      tags={"inventory"},
    *      summary="Post New Inventory",
    *      description="Post New Inventory",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InventoryCreateFormRequest")
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
    public function store(InventoryCreateFormRequest $request)
    {
    	$model = new Inventory;
    	$model = $this->requestAndDbIntersection($request, $model);
        $model->save();
        $model = $this->service->register($request, $model);
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/inventory/{id}",
    *      operationId="inventoryDetails",
    *      tags={"inventory"},
    *      summary="Show an Inventory",
    *      description="Show an Inventory",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Inventory ID",
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
        return $this->showOne(Inventory::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/inventory/{id}",
    *      operationId="inventoryUpdate",
    *      tags={"inventory"},
    *      summary="Update an Inventory",
    *      description="Update an Inventory",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Inventory ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/InventoryUpdateFormRequest")
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

    public function update(InventoryUpdateFormRequest $request, $id)
    {
        $model = Inventory::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
        $model->save();
        $model = $this->service->register($request, $model);
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/inventory/{id}",
    *      operationId="inventoryDelete",
    *      tags={"inventory"},
    *      summary="Delete an Inventory",
    *      description="Delete an Inventory",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Inventory ID",
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
        $model = Inventory::find($id);
        $model->delete();
        return $this->showMessage('Inventory Deleted');
    }
}
