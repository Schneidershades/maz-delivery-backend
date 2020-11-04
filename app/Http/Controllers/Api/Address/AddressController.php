<?php

namespace App\Http\Controllers\Api\Address;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\Address;

class AddressController extends ApiController
{
    
        /**
    * @OA\Get(
    *      path="/api/v1/addresses",
    *      operationId="addressLists",
    *      tags={"address"},
    *      summary="Get All Address",
    *      description="Get All Address",
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
        return $this->showAll(auth()->addresses());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/addresses",
    *      operationId="addressCreateAddress",
    *      tags={"address"},
    *      summary="Post New Address",
    *      description="Post New Address",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/AddressCreateFormRequest")
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
    public function store(AddressCreateFormRequest $request)
    {
    	$model = new Address;
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save();
        return $this->showMessage($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/addresses/{id}",
    *      operationId="addressDetails",
    *      tags={"address"},
    *      summary="Show an Address",
    *      description="Show an Address",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Address ID",
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
        return $this->showOne($this->modelRepository->find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/addresses/{id}",
    *      operationId="addressUpdateAddress",
    *      tags={"address"},
    *      summary="Update an Address",
    *      description="Update an Address",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Address ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/AddressUpdateFormRequest")
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

    public function update(AddressUpdateFormRequest $request, $id)
    {
        $model = $this->modelRepository->find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save();
        return $this->showMessage($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/addresses/{id}",
    *      operationId="addressDeleteAddress",
    *      tags={"address"},
    *      summary="Delete an Address",
    *      description="Delete an Address",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Address ID",
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
        $address = Address::find($id)->delete();
        return $this->showMessage('Address Deleted');
    }
}
