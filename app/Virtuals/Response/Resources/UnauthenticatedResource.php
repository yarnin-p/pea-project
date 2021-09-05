<?php

namespace App\Virtuals\Response\Resources;


/**
 * @OA\Schema(
 *      title="UnauthenticatedResource",
 *      description="API response error (unauthenticaed)",
 *      @OA\Xml(
 *          name="UnauthenticatedResource"
 *      )
 *  )
 */
class UnauthenticatedResource
{
    /**
     * @OA\Property(
     *      title="message",
     *      description="message",
     *      type="string",
     *      example="Unauthenticated."
     *  )
     */
    private $message;
}
