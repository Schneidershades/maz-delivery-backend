<?php

namespace App\Http\Controllers\Api\Bank;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/bank",
    *      operationId="bankLists",
    *      tags={"bank"},
    *      summary="Get All Bank",
    *      description="Get All Bank",
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
        return $this->showAll(auth()->bankDetails());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/bank",
    *      operationId="bankCreate",
    *      tags={"bank"},
    *      summary="Post New Bank",
    *      description="Post New Bank",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/BankCreateFormRequest")
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
    public function store(BankCreateFormRequest $request)
    {
    	$model = new Bank;
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/bank/{id}",
    *      operationId="bankDetails",
    *      tags={"bank"},
    *      summary="Show an Bank",
    *      description="Show an Bank",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Bank ID",
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
        return $this->showOne(Bank::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/bank/{id}",
    *      operationId="bankUpdate",
    *      tags={"bank"},
    *      summary="Update an Bank",
    *      description="Update an Bank",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Bank ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/BankUpdateFormRequest")
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

    public function update(BankUpdateFormRequest $request, $id)
    {
        $model = Bank::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/bank/{id}",
    *      operationId="bankDelete",
    *      tags={"bank"},
    *      summary="Delete an Bank",
    *      description="Delete an Bank",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Bank ID",
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
        $model = Bank::find($id)->delete();
        return $this->showMessage('Bank Deleted');
    }
}
