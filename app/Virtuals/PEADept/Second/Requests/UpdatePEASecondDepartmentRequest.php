<?php

namespace App\Virtuals\PEADept\Second\Requests;

/**
 *  @OA\Schema(
 *      title="UpdatePEASecondDepartmentRequest",
 *      description="Update second level of PEA department request",
 *      @OA\Xml(
 *          name="UpdatePEASecondDepartmentRequest"
 *      )
 *  )
 */
class UpdatePEASecondDepartmentRequest
{

    /**
     * @OA\Property(
     *      title="First PEA department ID",
     *      description="First PEA department ID",
     *      type="integer",
     *      example=5
     *  )
     */
    private $pea_dept_id;

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
