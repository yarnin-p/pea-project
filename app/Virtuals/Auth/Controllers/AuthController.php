<?php

namespace App\Virtuals\Auth\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthController extends Controller
{

    /**
     *  @OA\Post(
     *      path="/auth/register",
     *      operationId="register",
     *      tags={"Authentication"},
     *      summary="Store new user by given data",
     *      description="Store new user by given data",
     *      @OA\RequestBody(
     *          description="Store new user by given data",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/StoreRegisterRequest")
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
     *                          property="data",
     *                          type="object",
     *                          @OA\Property(
     *                              property="user",
     *                              type="object",
     *                              ref="#/components/schemas/RegisterResource"
     *                          ),
     *                          @OA\Property(
     *                              property="access_token",
     *                              title="access_token",
     *                              description="access_token",
     *                              type="string",
     *                              example="$1212dk.d8sh837.434erd.kejw8"
     *                          )
     *                      )
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
    public function register(Request $request) {}

    /**
     *  @OA\Post(
     *      path="/auth/login",
     *      operationId="getLogin",
     *      tags={"Authentication"},
     *      summary="Get login by given email and password",
     *      description="Get login by given email and password",
     *      @OA\RequestBody(
     *          description="Login by given email and password",
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/GetLoginRequest")
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
     *                          property="data",
     *                          type="object",
     *                          @OA\Property(
     *                              property="user",
     *                              type="object",
     *                              ref="#/components/schemas/LoginResource"
     *                          ),
     *                          @OA\Property(
     *                              property="access_token",
     *                              title="access_token",
     *                              description="access_token",
     *                              type="string",
     *                              example="$1212dk.d8sh837.434erd.kejw8"
     *                          )
     *                      )
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
    public function login() {}
}
