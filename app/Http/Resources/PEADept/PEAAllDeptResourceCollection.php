<?php

namespace App\Http\Resources\PEADept;

use App\Models\PEADept;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * @OA\Schema(
 *     title="PEAAllDeptResourceCollection",
 *     description="All level of PEA departments",
 *     @OA\Xml(
 *         name="PEAAllDeptResourceCollection"
 *     )
 * )
 */
class PEAAllDeptResourceCollection extends ResourceCollection
{

    /**
     * @OA\Property(
     *      property="id",
     *      title="ID",
     *      description="ID",
     *      type="int",
     *      example=1
     *  )
     */
    private $id;

    /**
     * @OA\Property(
     *      property="name",
     *      title="name",
     *      description="name",
     *      type="string",
     *      example="การไฟฟ้านครราชสีมา"
     *  )
     */
    private $name;

    /**
     * @OA\Property(
     *      title="second departments",
     *      description="second departments",
     *      property="second_departments",
     *      type="array",
     *      @OA\Items(
     *          @OA\Property(
     *              property="id",
     *              type="int",
     *              example=1
     *          ),
     *          @OA\Property(
     *              property="name",
     *              type="string",
     *              example="การไฟฟ้าสุรนารี"
     *          ),
     *          @OA\Property(
     *              property="third_departments",
     *              type="array",
     *              @OA\Items(
     *                  @OA\Property(
     *                      property="id",
     *                      type="int",
     *                      example=1
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      example="การไฟฟ้าสีคิ้ว"
     *                  ),
     *              )
     *          )
     *      )
     *  )
     */
    private $second_departments;

    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return $this->collection->map(function ($PEAFirstDepts) {
        return new PEADeptResourceCollection($this->collection);
//        });
    }
}
