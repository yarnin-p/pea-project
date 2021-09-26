<?php

namespace App\Http\Resources\Dimension;

use Illuminate\Http\Resources\Json\ResourceCollection;

class FirstDimensionResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($firstDimension) {
            return [
                'id' => $firstDimension->id,
                'pea_dept_id' => $firstDimension->pea_dept_id,
                'dimension_parent_id' => $firstDimension->dimension_parent_id,
                'name' => $firstDimension->name,
                'raw_data' => $firstDimension->raw_data,
                'created_at' => $firstDimension->created_at,
                'updated_at' => $firstDimension->updated_at,
            ];
        });
    }
}
