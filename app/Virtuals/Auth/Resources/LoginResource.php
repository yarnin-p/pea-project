<?php

namespace App\Virtuals\Auth\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


/**
 *  @OA\Schema(
 *      title="LoginResource",
 *      description="Login response",
 *      @OA\Xml(
 *          name="LoginResource"
 *      )
 *  )
 */
class LoginResource extends JsonResource
{
    /**
     * @OA\Property(
     *      title="ID",
     *      description="ID",
     *      type="integer",
     *      example=1
     *  )
     */
    private $id;

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
     *      title="email_verified_at",
     *      description="email_verified_at",
     *      type="string",
     *      example="2021-09-06 12:00:00"
     *  )
     */
    private $email_verified_at;

    /**
     * @OA\Property(
     *      title="created_at",
     *      description="created_at",
     *      type="string",
     *      example="2021-09-05 12:00:00"
     *  )
     */
    private $created_at;

    /**
     * @OA\Property(
     *      title="updated_at",
     *      description="updated_at",
     *      type="string",
     *      example="2021-09-06 12:00:00"
     *  )
     */
    private $updated_at;
}
