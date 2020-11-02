<?php

namespace App\Http\Controllers\Rydecoin;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;

class RydeCoinPackageController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/rydecoin-package",
    *      operationId="rydecoinPackageLists",
    *      tags={"rydecoinPackage"},
    *      summary="Get All RydecoinPackage",
    *      description="Get All RydecoinPackage",
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
        return $this->showAll(RydecoinPackage::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/rydecoin-package",
    *      operationId="rydecoinPackageCreate",
    *      tags={"rydecoinPackage"},
    *      summary="Post New RydecoinPackage",
    *      description="Post New RydecoinPackage",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/RydecoinPackageCreateFormRequest")
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
    public function store(RydecoinPackageCreateFormRequest $request)
    {
    	$model = new RydecoinPackage;
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/rydecoin-package/{id}",
    *      operationId="rydecoinPackageDetails",
    *      tags={"rydecoinPackage"},
    *      summary="Show an RydecoinPackage",
    *      description="Show an RydecoinPackage",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="RydecoinPackage ID",
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
        return $this->showOne(RydecoinPackage::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/rydecoin-package/{id}",
    *      operationId="rydecoinPackageUpdate",
    *      tags={"rydecoinPackage"},
    *      summary="Update an RydecoinPackage",
    *      description="Update an RydecoinPackage",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="RydecoinPackage ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/RydecoinPackageUpdateFormRequest")
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

    public function update(RydecoinPackageUpdateFormRequest $request, $id)
    {
        $model = RydecoinPackage::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/rydecoin-package/{id}",
    *      operationId="rydecoinPackageDelete",
    *      tags={"rydecoinPackage"},
    *      summary="Delete an RydecoinPackage",
    *      description="Delete an RydecoinPackage",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="RydecoinPackage ID",
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
        $model = RydecoinPackage::find($id)->delete();
        return $this->showMessage('RydecoinPackage Deleted');
    }
}
