<?php

namespace App\Http\Controllers\Api\Location;

use App\Http\Controllers\Api\ApiController;

class CountryController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/location/countries",
    *      operationId="all_countries",
    *      tags={"location"},
    *      summary="Get all countries",
    *      description="Get all countries",
    *      @OA\Response(
    *          response=200,
    *          description="Successful operation",
    *          @OA\MediaType(
    *             mediaType="application/json",
    *         ),
    *       ),
    * )
    */

    public function index()
    {
        return $this->showAll(Country::all());
    }

    /**
    * @OA\Get(
    *      path="/api/v1/location/countries/{id}",
    *      operationId="country_by_id",
    *      tags={"location"},
    *      summary="Get details of country by id with attached states",
    *      description="Get country with states in a country",
    *      @OA\Parameter(
    *          name="id",
    *          description="Country ID",
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
        return $this->showOne(Country::find($id));
    }
}
