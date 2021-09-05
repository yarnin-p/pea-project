<?php

namespace App\Virtuals\Response\Resources;


/**
 * @OA\Schema(
 *      title="ForbiddenResource",
 *      description="API response error (forbidden)",
 *      @OA\Xml(
 *          name="ForbiddenResource"
 *      )
 *  )
 */
class ForbiddenResource
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
     *      example=403
     *  )
     */
    private $code;

    /**
     * @OA\Property(
     *      title="message",
     *      description="message",
     *      type="string",
     *      example="Forbidden."
     *  )
     */
    private $message;
}
