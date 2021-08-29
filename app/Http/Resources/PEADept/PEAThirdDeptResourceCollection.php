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
        return $this->collection->map(function ($PEASecondDept) {
            return [
                'id' => $PEASecondDept->id,
                'name' => $PEASecondDept->name
            ];
        });
    }
}
