<?php

namespace App\Virtuals\PEADept\Second\Controllers;

class PEASecondDeptController {

    /**
     *  @OA\Post(
     *      path="/pea-departments/second",
     *      operationId="storeSecondLevelPEADepartments",
     *      tags={"PEA Departments"},
     *      summary="Store second level PEA departments by given data",
     *      security={{"bearerAuth": {}}},
     *      description="Store second level PEA departments by given data",
     *      @OA\RequestBody(
     *          description="Store second level department by given data",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StorePEASecondDepartmentRequest")
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
     *      path="/pea-departments/second",
     *      operationId="getAllSecondLevelPEADepartments",
     *      tags={"PEA Departments"},
     *      summary="Get list of second level PEA departments",
     *      security={{"bearerAuth": {}}},
     *      description="Returns list of second level PEA departments",
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
     *                      @OA\Items(ref="#/components/schemas/PEASecondDeptResourceCollection")
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
     *      path="/pea-departments/second/{PEASecondDept}",
     *      operationId="getSecondLevelPEADepartmentByID",
     *      tags={"PEA Departments"},
     *      summary="Get second level PEA department by ID",
     *      security={{"bearerAuth": {}}},
     *      description="Get second level PEA department by ID",
     *      @OA\Parameter(
     *          name="PEASecondDept",
     *          in="path",
     *          description="ID of second level department that to be get",
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
     *                      ref="#/components/schemas/PEASecondDeptResourceCollection")
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
     *      path="/pea-departments/second/{PEASecondDept}",
     *      operationId="updateSecondLevelPEADepartments",
     *      tags={"PEA Departments"},
     *      summary="Update second level department by given ID and data that to be update",
     *      security={{"bearerAuth": {}}},
     *      description="Update second level department by given ID and data that to be update",
     *      @OA\Parameter(
     *          name="PEASecondDept",
     *          in="path",
     *          description="ID of second level department that to be filter",
     *          required=true,
     *          @OA\Schema(
     *             type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          description="Update second level department by given ID and data that to be update",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/UpdatePEASecondDepartmentRequest")
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
     *      path="/pea-departments/second/{PEASecondDept}",
     *      operationId="deleteSecondLevelPEADepartmentByID",
     *      tags={"PEA Departments"},
     *      summary="Delete second level PEA department by ID",
     *      security={{"bearerAuth": {}}},
     *      description="Delete second level PEA department by ID",
     *      @OA\Parameter(
     *          name="PEASecondDept",
     *          in="path",
     *          description="ID of second level department that to be delete",
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
