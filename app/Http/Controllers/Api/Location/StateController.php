<?php

namespace App\Http\Controllers\Api\Location;

use App\Http\Controllers\Api\ApiController;

class StateController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/location/state/{id}",
    *      operationId="state_by_id",
    *      tags={"location"},
    *      summary="Get all cities in a state",
    *      description="Get all cities in a state",
    *      @OA\Parameter(
    *          name="id",
    *          description="State ID",
    *          required=true,
    *          in="path",
    *          @OA\Schema(
    *              type="integer"
    *          )
    *      ),
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    * )
    */

    public function show($id)
    {
        return $this->showOne(State::find($id));
    }
}
