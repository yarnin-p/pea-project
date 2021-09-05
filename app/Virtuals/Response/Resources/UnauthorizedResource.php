<?php

namespace App\Virtuals\Response\Resources;


/**
 * @OA\Schema(
 *      title="UnauthorizedResource",
 *      description="API response error (unauthorized)",
 *      @OA\Xml(
 *          name="UnauthorizedResource"
 *      )
 *  )
 */
class UnauthorizedResource
{
    /**
     * @OA\Property(
     *      title="ID",
     *      description="ID",
     *      type="boolean",
     *      example=false
     *  )
     */
    private $success;

    /**
     * @OA\Property(
     *      title="code",
     *      description="code",
     *      type="integer",
     *      example=401
     *  )
     */
    private $code;

    /**
     * @OA\Property(
     *      title="message",
     *      description="message",
     *      type="string",
     *      example="Unauthorized."
     *  )
     */
    private $message;
}
