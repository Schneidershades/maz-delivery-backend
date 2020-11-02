<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;

class MobileTransactionController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/mobile-transaction",
    *      operationId="mobileTransactionLists",
    *      tags={"mobileTransaction"},
    *      summary="Get All MobileTransaction",
    *      description="Get All MobileTransaction",
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
        return $this->showAll(MobileTransaction::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/mobile-transaction",
    *      operationId="mobileTransactionCreate",
    *      tags={"mobileTransaction"},
    *      summary="Post New MobileTransaction",
    *      description="Post New MobileTransaction",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/MobileTransactionCreateFormRequest")
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
    public function store(MobileTransactionCreateFormRequest $request)
    {
    	$model = new MobileTransaction;
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/mobile-transaction/{id}",
    *      operationId="mobileTransactionDetails",
    *      tags={"mobileTransaction"},
    *      summary="Show an MobileTransaction",
    *      description="Show an MobileTransaction",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="MobileTransaction ID",
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
        return $this->showOne(MobileTransaction::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/mobile-transaction/{id}",
    *      operationId="mobileTransactionUpdate",
    *      tags={"mobileTransaction"},
    *      summary="Update an MobileTransaction",
    *      description="Update an MobileTransaction",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="MobileTransaction ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/MobileTransactionUpdateFormRequest")
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

    public function update(MobileTransactionUpdateFormRequest $request, $id)
    {
        $model = MobileTransaction::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/mobile-transaction/{id}",
    *      operationId="mobileTransactionDelete",
    *      tags={"mobileTransaction"},
    *      summary="Delete an MobileTransaction",
    *      description="Delete an MobileTransaction",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="MobileTransaction ID",
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
        $model = MobileTransaction::find($id)->delete();
        return $this->showMessage('MobileTransaction Deleted');
    }
}
