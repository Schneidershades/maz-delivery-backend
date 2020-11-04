<?php

namespace App\Http\Controllers\Api\Bank;

use App\Http\Controllers\Api\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\BankDetail;

class BankDetailController extends ApiController
{
    
        /**
    * @OA\Get(
    *      path="/api/v1/bank-details",
    *      operationId="bankdetailsLists",
    *      tags={"bankDetails"},
    *      summary="Get All Bank Details",
    *      description="Get All Bank Details",
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
    *      path="/api/v1/bank-details",
    *      operationId="bankDetailsCreate",
    *      tags={"bankDetails"},
    *      summary="Post New Bank Details",
    *      description="Post New Bank Details",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/BankDetailCreateFormRequest")
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
    public function store(BankDetailCreateFormRequest $request)
    {
    	$model = new BankDetail;
    	$model = $this->requestAndDbIntersection($request, $model);
        $model = $model->save();
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/bank-details/{id}",
    *      operationId="bankDetailsDetails",
    *      tags={"bankDetails"},
    *      summary="Show an Bank Details",
    *      description="Show an Bank Details",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Bank Detail ID",
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
        return $this->showOne(BankDetail::find($id));
    }

    /**
    * @OA\PUT(
    *      path="/api/v1/bank-details/{id}",
    *      operationId="bankDetailsUpdate",
    *      tags={"bankDetails"},
    *      summary="Update an Bank Details",
    *      description="Update an Bank Details",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Bank Detail ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/BankDetailUpdateFormRequest")
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

    public function update(BankDetailUpdateFormRequest $request, $id)
    {
        $model = BankDetail::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
        $model = $model->save();
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/bank-details/{id}",
    *      operationId="bankDetailsDelete",
    *      tags={"bankDetails"},
    *      summary="Delete an Bank Details",
    *      description="Delete an Bank Details",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Bank Detail ID",
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
        $model = BankDetail::find($id)->delete();
        return $this->showMessage('BankDetail Deleted');
    }
}
