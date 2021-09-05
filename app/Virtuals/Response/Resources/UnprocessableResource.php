<?php

namespace App\Virtuals\Response\Resources;


/**
 * @OA\Schema(
 *      title="UnprocessableResource",
 *      description="API response error (unprocessable)",
 *      @OA\Xml(
 *          name="UnprocessableResource"
 *      )
 *  )
 */
class UnprocessableResource
{
    /**
     * @OA\Property(
     *      title="message",
     *      description="message",
     *      type="string",
     *      example="The given data was invalid."
     *  )
     */
    private $message;

    /**
     * @OA\Property(
     *      title="errors",
     *      description="error message(s)",
     *      type="object"
     *  )
     */
    private $errors;
}
