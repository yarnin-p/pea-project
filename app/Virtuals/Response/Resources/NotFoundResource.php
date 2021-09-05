<?php

namespace App\Virtuals\Response\Resources;


/**
 * @OA\Schema(
 *      title="NotFoundResource",
 *      description="API response error (not found)",
 *      @OA\Xml(
 *          name="NotFoundResource"
 *      )
 *  )
 */
class NotFoundResource
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
     *      example=404
     *  )
     */
    private $code;

    /**
     * @OA\Property(
     *      title="message",
     *      description="message",
     *      type="string",
     *      example="Not found."
     *  )
     */
    private $message;
}
