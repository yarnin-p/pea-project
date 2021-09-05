<?php

namespace App\Virtuals\Response\Resources;


/**
 * @OA\Schema(
 *      title="SuccessWithNoDataResource",
 *      description="API response success with no return data",
 *      @OA\Xml(
 *          name="SuccessWithNoDataResource"
 *      )
 *  )
 */
class SuccessWithNoDataResource
{
    /**
     * @OA\Property(
     *      title="ID",
     *      description="ID",
     *      type="boolean",
     *      example=true
     *  )
     */
    private $success;

    /**
     * @OA\Property(
     *      title="code",
     *      description="code",
     *      type="integer",
     *      example=200
     *  )
     */
    private $code;

    /**
     * @OA\Property(
     *      title="message",
     *      description="message",
     *      type="string",
     *      example="Successfully."
     *  )
     */
    private $message;
}
