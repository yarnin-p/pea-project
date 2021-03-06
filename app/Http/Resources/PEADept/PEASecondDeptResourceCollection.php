<?php

namespace App\Http\Resources\PEADept;

use Illuminate\Http\Resources\Json\ResourceCollection;


class PEASecondDeptResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        return $this->collection->map(function ($PEASecondDept) {
            return [
                'id' => $PEASecondDept->id,
                'name' => $PEASecondDept->name,
                'created_at' => $PEASecondDept->created_at,
                'updated_at' => $PEASecondDept->updated_at,
                'third_departments' =>
                    $this->when($PEASecondDept->relationLoaded('PEAThirdDepts'),
                        new PEAThirdDeptResourceCollection($PEASecondDept->PEAThirdDepts))
            ];
        });
    }
}
