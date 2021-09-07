<?php

namespace App\Virtuals\Auth\Requests;

/**
 *  @OA\Schema(
 *      title="GetLoginRequest",
 *      description="Get login request",
 *      @OA\Xml(
 *          name="GetLoginRequest"
 *      )
 *  )
 */
class GetLoginRequest
{
    /**
     * @OA\Property(
     *      title="email",
     *      description="email",
     *      type="string",
     *      example="john.d@gmail.com"
     *  )
     */
    private $email;

    /**
     * @OA\Property(
     *      title="password",
     *      description="password",
     *      type="string",
     *      example="secret12"
     *  )
     */
    private $password;
}
