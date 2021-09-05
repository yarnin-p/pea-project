<?php

namespace App\Virtuals\PEADept\All\Controllers;

class PEAAllDeptController {

    /**
     *  @OA\Get(
     *      path="/pea-departments/all",
     *      operationId="getAllLevelPEADepartments",
     *      tags={"PEA Departments"},
     *      summary="Get list of all level PEA departments",
     *      security={{"bearerAuth": {}}},
     *      description="Returns list of all level PEA departments",
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
     *                      @OA\Items(ref="#/components/schemas/PEAAllFirstDeptResourceCollection")
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
    public function all() {}
}
