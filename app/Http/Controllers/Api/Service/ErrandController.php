<?php

namespace App\Http\Controllers\Api\Service;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\Errand;

class ErrandController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/errand",
    *      operationId="errandLists",
    *      tags={"errand"},
    *      summary="Get All Errand",
    *      description="Get All Errand",
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
        return $this->showAll(Errand::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/errand",
    *      operationId="errandCreate",
    *      tags={"errand"},
    *      summary="Post New Errand",
    *      description="Post New Errand",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ErrandCreateFormRequest")
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *          response=400,
    *          description="Bad Request"
    *       ),
    *      @OA\Response(
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
    public function store(ErrandCreateFormRequest $request)
    {
    	$model = new Errand;
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save();
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/errand/{id}",
    *      operationId="errandDetails",
    *      tags={"errand"},
    *      summary="Show an Errand",
    *      description="Show an Errand",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Errand ID",
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
        return $this->showOne(Errand::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/errand/{id}",
    *      operationId="errandUpdate",
    *      tags={"errand"},
    *      summary="Update an Errand",
    *      description="Update an Errand",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Errand ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/ErrandUpdateFormRequest")
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

    public function update(ErrandUpdateFormRequest $request, $id)
    {
        $model = Errand::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/errand/{id}",
    *      operationId="errandDelete",
    *      tags={"errand"},
    *      summary="Delete an Errand",
    *      description="Delete an Errand",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Errand ID",
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
        $model = Errand::find($id)->delete();
        return $this->showMessage('Errand Deleted');
    }
}
