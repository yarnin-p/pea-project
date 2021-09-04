<?php

namespace App\Http\Resources\PEADept;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PEAThirdDeptResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($PEAThirdDept) {
            return [
                'id' => $PEAThirdDept->id,
                'name' => $PEAThirdDept->name,
                'created_at' => $PEAThirdDept->created_at,
                'updated_at' => $PEAThirdDept->updated_at,
            ];
        });
    }
}
