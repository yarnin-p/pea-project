<?php

namespace App\Virtuals\Auth\Requests;

/**
 * @OA\Schema(
 *      title="StoreRegisterRequest",
 *      description="Register",
 *      @OA\Xml(
 *          name="StoreRegisterRequest"
 *      )
 *  )
 */
class StoreRegisterRequest
{

    /**
     * @OA\Property(
     *      title="name",
     *      description="name",
     *      type="string",
     *      example="John Doe"
     *  )
     */
    private $name;

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

    /**
     * @OA\Property(
     *      title="password_confirmation",
     *      description="password_confirmation",
     *      type="string",
     *      example="secret12"
     *  )
     */
    private $password_confirmation;
}
