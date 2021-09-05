<?php

namespace App\Virtuals\PEADept\Third\Requests;

/**
 *  @OA\Schema(
 *      title="UpdatePEAThirdDepartmentRequest",
 *      description="Update third level of PEA department request",
 *      @OA\Xml(
 *          name="UpdatePEAThirdDepartmentRequest"
 *      )
 *  )
 */
class UpdatePEAThirdDepartmentRequest
{

    /**
     * @OA\Property(
     *      title="Second PEA department ID",
     *      description="Second PEA department ID",
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
