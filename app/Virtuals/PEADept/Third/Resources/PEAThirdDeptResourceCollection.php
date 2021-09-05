<?php


namespace App\Virtuals\PEADept\Third\Resources;


/**
 * @OA\Schema(
 *      title="PEAThirdDeptResourceCollection",
 *      description="Third level of PEA departments",
 *      @OA\Xml(
 *          name="PEAThirdDeptResourceCollection"
 *      )
 *  )
 */
class PEAThirdDeptResourceCollection
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
     *      example="การไฟฟ้าโนนสูง"
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
}
