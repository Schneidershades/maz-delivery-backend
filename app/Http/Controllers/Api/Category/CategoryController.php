<?php

namespace App\Http\Controllers\Api\Category;

use App\Http\Controllers\Api\ApiController;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends ApiController
{
    /**
    * @OA\Get(
    *      path="/api/v1/categories",
    *      operationId="categoryLists",
    *      tags={"general"},
    *      summary="Get All Category",
    *      description="Get All Category",
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
        return $this->showAll(Category::all());
    }

    /**
    * @OA\Post(
    *      path="/api/v1/categories",
    *      operationId="categoriesCreate",
    *      tags={"categories"},
    *      summary="Post New Category",
    *      description="Post New Category",
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/CategoryCreateFormRequest")
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
    public function store(CategoryCreateFormRequest $request)
    {
    	$model = new Category;
    	$model = $this->requestAndDbIntersection($request, $model);
        $model = $model->save();
        return $this->showOne($model);
    }


    /**
    * @OA\Get(
    *      path="/api/v1/categories/{id}",
    *      operationId="categoriesDetails",
    *      tags={"categories"},
    *      summary="Show an Category",
    *      description="Show an Category",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Category ID",
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
        return $this->showOne(Category::find($id));
    }


    /**
    * @OA\PUT(
    *      path="/api/v1/categories/{id}",
    *      operationId="categoriesUpdate",
    *      tags={"categories"},
    *      summary="Update an Category",
    *      description="Update an Category",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Category ID",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
    *      @OA\RequestBody(
    *          required=true,
    *          @OA\JsonContent(ref="#/components/schemas/CategoryUpdateFormRequest")
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

    public function update(CategoryUpdateFormRequest $request, $id)
    {
        $model = Category::find($id);
    	$model = $this->requestAndDbIntersection($request, $model);
        $model = $model->save();
        return $this->showOne($model);
    }

     /**
    * @OA\Delete(
    *      path="/api/v1/categories/{id}",
    *      operationId="categoriesDelete",
    *      tags={"categories"},
    *      summary="Delete an Category",
    *      description="Delete an Category",
    *      
     *      @OA\Parameter(
     *          name="id",
     *          description="Category ID",
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
        $model = Category::find($id)->delete();
        return $this->showMessage('Category Deleted');
    }
}
