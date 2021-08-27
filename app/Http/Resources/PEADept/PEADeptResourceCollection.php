<?php

namespace App\Http\Resources\PEADept;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PEADeptResourceCollection extends ResourceCollection
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
            $PEASecondDeptsData = [];
            foreach ($PEAFirstDepts->PEASecondDepts as $secondDeptKey => $PEASecondDept) {
                $PEASecondDeptsData[$secondDeptKey]['id'] = $PEASecondDept->id;
                $PEASecondDeptsData[$secondDeptKey]['name'] = $PEASecondDept->name;

                $PEAThirdDeptsData = [];
                foreach ($PEASecondDept->PEAThirdDepts as $thirdDeptKey => $PEAThirdDept) {
                    $PEAThirdDeptsData['id'] = $PEAThirdDept->id;
                    $PEAThirdDeptsData['name'] = $PEAThirdDept->name;

                    $PEASecondDeptsData[$secondDeptKey]['third_departments'][$thirdDeptKey] = $PEAThirdDeptsData;
                }
            }

            return [
                'id' => $PEAFirstDepts->id,
                'name' => $PEAFirstDepts->name,
                'second_departments' => $PEASecondDeptsData,
            ];
        });
    }
}
