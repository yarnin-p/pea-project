<?php

namespace App\Virtuals\PEADept\First\Requests;

/**
 *  @OA\Schema(
 *      title="StorePEAFirstDepartmentRequest",
 *      description="Store first level of PEA department request",
 *      @OA\Xml(
 *          name="StorePEAFirstDepartmentRequest"
 *      )
 *  )
 */
class StorePEAFirstDepartmentRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="name",
     *      type="string",
     *      example="การไฟฟ้าสูงเนิน"
     *  )
     */
    private $name;
}
