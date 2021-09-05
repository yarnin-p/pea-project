<?php

namespace App\Virtuals\PEADept\First\Controllers;

class PEAFirstDeptController {

    /**
     *  @OA\Post(
     *      path="/pea-departments/first",
     *      operationId="storeFirstLevelPEADepartments",
     *      tags={"PEA Departments"},
     *      summary="Store first level PEA departments by given data",
     *      security={{"bearerAuth": {}}},
     *      description="Store first level PEA departments by given data",
     *      @OA\RequestBody(
     *          description="Store first level department by given data",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePEAFirstDepartmentRequest")
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
     *      path="/pea-departments/first",
     *      operationId="getAllFirstLevelPEADepartments",
     *      tags={"PEA Departments"},
     *      summary="Get list of first level PEA departments",
     *      security={{"bearerAuth": {}}},
     *      description="Returns list of first level PEA departments",
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
     *                      @OA\Items(ref="#/components/schemas/PEAFirstDeptResourceCollection")
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
     *      path="/pea-departments/first/{PEAFirstDept}",
     *      operationId="getFirstLevelPEADepartmentByID",
     *      tags={"PEA Departments"},
     *      summary="Get first level PEA department by ID",
     *      security={{"bearerAuth": {}}},
     *      description="Get first level PEA department by ID",
     *      @OA\Parameter(
     *          name="PEAFirstDept",
     *          in="path",
     *          description="ID of first level department that to be get",
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
     *                      ref="#/components/schemas/PEAFirstDeptResourceCollection")
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
     *      path="/pea-departments/first/{PEAFirstDept}",
     *      operationId="updateFirstLevelPEADepartments",
     *      tags={"PEA Departments"},
     *      summary="Update first level department by given ID and data that to be update",
     *      security={{"bearerAuth": {}}},
     *      description="Update first level department by given ID and data that to be update",
     *      @OA\Parameter(
     *          name="PEAFirstDept",
     *          in="path",
     *          description="ID of first level department that to be filter",
     *          required=true,
     *          @OA\Schema(
     *             type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Update first level department by given ID and data that to be update",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdatePEAFirstDepartmentRequest")
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
     *      path="/pea-departments/first/{PEAFirstDept}",
     *      operationId="deleteFirstLevelPEADepartmentByID",
     *      tags={"PEA Departments"},
     *      summary="Delete first level PEA department by ID",
     *      security={{"bearerAuth": {}}},
     *      description="Delete first level PEA department by ID",
     *      @OA\Parameter(
     *          name="PEAFirstDept",
     *          in="path",
     *          description="ID of first level department that to be delete",
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
