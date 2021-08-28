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
        return $this->collection->map(function ($PEADept) {
            return [
                'id' => $PEADept->id,
                'name' => $PEADept->name
            ];
        });
    }
}
