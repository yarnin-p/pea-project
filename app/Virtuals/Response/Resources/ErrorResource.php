<?php

namespace App\Virtuals\Response\Resources;


/**
 * @OA\Schema(
 *      title="ErrorResource",
 *      description="API response error",
 *      @OA\Xml(
 *          name="ErrorResource"
 *      )
 *  )
 */
class ErrorResource
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
     *      example=500
     *  )
     */
    private $code;

    /**
     * @OA\Property(
     *      title="message",
     *      description="message",
     *      type="string",
     *      example="Something went wrong."
     *  )
     */
    private $message;
}
