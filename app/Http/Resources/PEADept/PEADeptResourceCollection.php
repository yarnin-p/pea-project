<?php

namespace App\Http\Resources\PEADept;

use Carbon\Carbon;
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
        return $this->collection->map(function ($PEADept) {
            return [
                'id' => $PEADept->id,
                'name' => $PEADept->name,
                'created_at' => $PEADept->created_at,
                'updated_at' => $PEADept->updated_at,
                'second_departments' =>
                    $this->when($PEADept->relationLoaded('PEASecondDepts'),
                        new PEASecondDeptResourceCollection($PEADept->PEASecondDepts))
            ];
        });
    }
}
