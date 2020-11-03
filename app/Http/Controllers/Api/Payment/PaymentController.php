<?php

namespace App\Http\Controllers\Api\Payment;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/payment",
    *      operationId="paymentLists",
    *      tags={"payment"},
    *      summary="Get All Payment",
    *      description="Get All Payment",
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
        return $this->showAll(Payment::all());
    }


    /**
    * @OA\Get(
    *      path="/api/v1/payment/{id}",
    *      operationId="paymentDetails",
    *      tags={"payment"},
    *      summary="Show an Payment",
    *      description="Show an Payment",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Payment ID",
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
        return $this->showOne(Payment::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/payment/{id}",
    *      operationId="paymentUpdate",
    *      tags={"payment"},
    *      summary="Update an Payment",
    *      description="Update an Payment",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Payment ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/PaymentUpdateFormRequest")
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

    public function update(PaymentUpdateFormRequest $request, $id)
    {
        $model = Payment::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/payment/{id}",
    *      operationId="paymentDelete",
    *      tags={"payment"},
    *      summary="Delete an Payment",
    *      description="Delete an Payment",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Payment ID",
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
        $model = Payment::find($id)->delete();
        return $this->showMessage('Payment Deleted');
    }
}
