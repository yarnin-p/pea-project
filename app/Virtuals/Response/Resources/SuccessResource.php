<?php

namespace App\Virtuals\Response\Resources;


/**
 * @OA\Schema(
 *      title="SuccessResource",
 *      description="API response success",
 *      @OA\Xml(
 *          name="SuccessResource"
 *      )
 *  )
 */
class SuccessResource
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


    /**
     * @OA\Property(
     *      title="data",
     *      description="data",
     *      type="object",
     *  )
     */
    private $data;
}
