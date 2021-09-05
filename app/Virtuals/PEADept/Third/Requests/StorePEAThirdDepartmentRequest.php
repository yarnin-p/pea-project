<?php

namespace App\Virtuals\PEADept\Third\Requests;

/**
 *  @OA\Schema(
 *      title="StorePEAThirdDepartmentRequest",
 *      description="Store third level of PEA department request",
 *      @OA\Xml(
 *          name="StorePEAThirdDepartmentRequest"
 *      )
 *  )
 */
class StorePEAThirdDepartmentRequest
{

    /**
     * @OA\Property(
     *      title="Second PEA department ID",
     *      description="Second PEA department ID",
     *      type="integer",
     *      example=1
     *  )
     */
    private $pea_dept_id;

    /**
     * @OA\Property(
     *      title="name",
     *      description="name",
     *      type="string",
     *      example="การไฟฟ้าเมืองคง"
     *  )
     */
    private $name;
}
