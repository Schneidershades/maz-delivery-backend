<?php

namespace App\Http\Controllers\Vehicle;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
    * @OA\Get(
    *      path="/api/v1/vehicle",
    *      operationId="vehicleLists",
    *      tags={"vehicle"},
    *      summary="Get All Vehicle",
    *      description="Get All Vehicle",
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
        return $this->showAll(Vehicle::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/vehicle",
    *      operationId="vehicleCreate",
    *      tags={"vehicle"},
    *      summary="Post New Vehicle",
    *      description="Post New Vehicle",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/VehicleCreateFormRequest")
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
    public function store(VehicleCreateFormRequest $request)
    {
    	$model = new Vehicle;
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/vehicle/{id}",
    *      operationId="vehicleDetails",
    *      tags={"vehicle"},
    *      summary="Show an Vehicle",
    *      description="Show an Vehicle",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Vehicle ID",
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
        return $this->showOne(Vehicle::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/vehicle/{id}",
    *      operationId="vehicleUpdate",
    *      tags={"vehicle"},
    *      summary="Update an Vehicle",
    *      description="Update an Vehicle",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Vehicle ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/VehicleUpdateFormRequest")
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

    public function update(VehicleUpdateFormRequest $request, $id)
    {
        $model = Vehicle::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
    	$model = $this->save($model);
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/vehicle/{id}",
    *      operationId="vehicleDelete",
    *      tags={"vehicle"},
    *      summary="Delete an Vehicle",
    *      description="Delete an Vehicle",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Vehicle ID",
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
        $model = Vehicle::find($id)->delete();
        return $this->showMessage('Vehicle Deleted');
    }
}
