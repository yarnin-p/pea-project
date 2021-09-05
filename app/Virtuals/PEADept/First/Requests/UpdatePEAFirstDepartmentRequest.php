<?php

namespace App\Virtuals\PEADept\First\Requests;

/**
 *  @OA\Schema(
 *      title="UpdatePEAFirstDepartmentRequest",
 *      description="Update first level of PEA department request",
 *      @OA\Xml(
 *          name="UpdatePEAFirstDepartmentRequest"
 *      )
 *  )
 */
class UpdatePEAFirstDepartmentRequest
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
