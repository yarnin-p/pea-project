<?php


namespace App\Virtuals\PEADept\All\Resources;


/**
 * @OA\Schema(
 *      title="PEAAllSecondDeptResourceCollection",
 *      description="Second level of PEA departments",
 *      @OA\Xml(
 *          name="PEAAllSecondDeptResourceCollection"
 *      )
 *  )
 */
class PEAAllSecondDeptResourceCollection
{

    /**
     * @OA\Property(
     *      title="ID",
     *      description="ID",
     *      type="integer",
     *      example=1
     *  )
     */
    private $id;

    /**
     * @OA\Property(
     *      title="name",
     *      description="name",
     *      type="string",
     *      example="การไฟฟ้าสีคิ้ว"
     *  )
     */
    private $name;

    /**
     * @OA\Property(
     *      title="created_at",
     *      description="created_at",
     *      type="string",
     *      example="2021-09-05 12:00:00"
     *  )
     */
    private $created_at;

    /**
     * @OA\Property(
     *      title="updated_at",
     *      description="updated_at",
     *      type="string",
     *      example="2021-09-06 12:00:00"
     *  )
     */
    private $updated_at;

    /**
     * @OA\Property(
     *      title="third_departments",
     *      description="third_departments",
     *      type="array",
     *      @OA\Items(ref="#/components/schemas/PEAAllThirdDeptResourceCollection")
     *  )
     */
    private $third_departments;
}
