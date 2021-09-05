<?php

namespace App\Virtuals\PEADept\Third\Controllers;

class PEAThirdDeptController {

    /**
     *  @OA\Post(
     *      path="/pea-departments/third",
     *      operationId="storeThirdLevelPEADepartments",
     *      tags={"PEA Departments"},
     *      summary="Store third level PEA departments by given data",
     *      security={{"bearerAuth": {}}},
     *      description="Store third level PEA departments by given data",
     *      @OA\RequestBody(
     *          description="Store third level department by given data",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePEAThirdDepartmentRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful Operation",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/SuccessWithNoDataResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/UnauthenticatedResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/NotFoundResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/UnprocessableResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/ErrorResource"
     *                  )
     *              }
     *          )
     *      )
     *  )
     */
    public function store() {}

    /**
     *  @OA\Get(
     *      path="/pea-departments/third",
     *      operationId="getAllThirdLevelPEADepartments",
     *      tags={"PEA Departments"},
     *      summary="Get list of third level PEA departments",
     *      security={{"bearerAuth": {}}},
     *      description="Returns list of third level PEA departments",
     *      @OA\Response(
     *          response=200,
     *          description="Successful Operation",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/SuccessResource"
     *                  ),
     *                  @OA\Schema(
     *                      @OA\Property(
     *                      property="data",
     *                      type="array",
     *                      @OA\Items(ref="#/components/schemas/PEAThirdDeptResourceCollection")
     *                      )
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/UnauthenticatedResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/NotFoundResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/ErrorResource"
     *                  )
     *              }
     *          )
     *      )
     *  )
     */
    public function index() {}

    /**
     *  @OA\Get(
     *      path="/pea-departments/third/{PEAThirdDept}",
     *      operationId="getThirdLevelPEADepartmentByID",
     *      tags={"PEA Departments"},
     *      summary="Get third level PEA department by ID",
     *      security={{"bearerAuth": {}}},
     *      description="Get third level PEA department by ID",
     *      @OA\Parameter(
     *          name="PEAThirdDept",
     *          in="path",
     *          description="ID of third level department that to be get",
     *          required=true,
     *          @OA\Schema(
     *             type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful Operation",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/SuccessResource"
     *                  ),
     *                  @OA\Schema(
     *                      @OA\Property(
     *                      property="data",
     *                      type="object",
     *                      ref="#/components/schemas/PEAThirdDeptResourceCollection")
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/UnauthenticatedResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/NotFoundResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/ErrorResource"
     *                  )
     *              }
     *          )
     *      )
     *  )
     */
    public function show() {}

    /**
     *  @OA\Put(
     *      path="/pea-departments/third/{PEAThirdDept}",
     *      operationId="updateThirdLevelPEADepartments",
     *      tags={"PEA Departments"},
     *      summary="Update third level department by given ID and data that to be update",
     *      security={{"bearerAuth": {}}},
     *      description="Update third level department by given ID and data that to be update",
     *      @OA\Parameter(
     *          name="PEAThirdDept",
     *          in="path",
     *          description="ID of third level department that to be filter",
     *          required=true,
     *          @OA\Schema(
     *             type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Update third level department by given ID and data that to be update",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdatePEAThirdDepartmentRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful Operation",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/SuccessWithNoDataResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/UnauthenticatedResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/NotFoundResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/UnprocessableResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/ErrorResource"
     *                  )
     *              }
     *          )
     *      )
     *  )
     */
    public function update() {}

    /**
     *  @OA\Delete(
     *      path="/pea-departments/second/{PEAThirdDept}",
     *      operationId="deleteThirdLevelPEADepartmentByID",
     *      tags={"PEA Departments"},
     *      summary="Delete third level PEA department by ID",
     *      security={{"bearerAuth": {}}},
     *      description="Delete third level PEA department by ID",
     *      @OA\Parameter(
     *          name="PEAThirdDept",
     *          in="path",
     *          description="ID of third level department that to be delete",
     *          required=true,
     *          @OA\Schema(
     *             type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful Operation",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/SuccessWithNoDataResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/UnauthenticatedResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not found",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/NotFoundResource"
     *                  )
     *              }
     *          )
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error",
     *          @OA\JsonContent(
     *              allOf={
     *                  @OA\Schema(
     *                      ref="#/components/schemas/ErrorResource"
     *                  )
     *              }
     *          )
     *      )
     *  )
     */
    public function destroy() {}
}
