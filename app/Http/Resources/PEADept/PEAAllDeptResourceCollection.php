<?php

namespace App\Http\Resources\PEADept;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PEAAllDeptResourceCollection extends ResourceCollection
{
    /**¬
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($PEAFirstDepts) {
            foreach ($PEAFirstDepts->PEASecondDepts as $secondDeptKey => $PEASecondDept) {
                $PEASecondDeptsData[$secondDeptKey]['id'] = $PEASecondDept->id;
                $PEASecondDeptsData[$secondDeptKey]['name'] = $PEASecondDept->name;

                $PEASecondDeptsData[$secondDeptKey]['third_departments'] = [];
                foreach ($PEASecondDept->PEAThirdDepts as $thirdDeptKey => $PEAThirdDept) {
                    $PEASecondDeptsData[$secondDeptKey]['third_departments'][$thirdDeptKey]['id'] = $PEAThirdDept->id;
                    $PEASecondDeptsData[$secondDeptKey]['third_departments'][$thirdDeptKey]['name'] = $PEAThirdDept->name;
                }
            }

            return [
                'id' => $PEAFirstDepts->id,
                'name' => $PEAFirstDepts->name,
                'second_departments' => $PEASecondDeptsData ?? [],
            ];
        });
    }
}
