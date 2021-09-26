<?php

namespace App\Http\Resources\Dimension;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FourthDimensionResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($fourthDimension) {
            return [
                'id' => $fourthDimension->id,
                'pea_dept_id' => $fourthDimension->pea_dept_id,
                'dimension_parent_id' => $fourthDimension->dimension_parent_id,
                'name' => $fourthDimension->name,
                'raw_data' => $fourthDimension->raw_data,
                'created_at' => $fourthDimension->created_at,
                'updated_at' => $fourthDimension->updated_at,
            ];
        });
    }
}
