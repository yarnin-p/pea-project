<?php

namespace App\Http\Resources\Dimension;

use Illuminate\Http\Resources\Json\ResourceCollection;

class SecondDimensionResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($secondDimension) {
            return [
                'id' => $secondDimension->id,
                'pea_dept_id' => $secondDimension->pea_dept_id,
                'dimension_parent_id' => $secondDimension->dimension_parent_id,
                'name' => $secondDimension->name,
                'raw_data' => $secondDimension->raw_data,
                'created_at' => $secondDimension->created_at,
                'updated_at' => $secondDimension->updated_at,
            ];
        });
    }
}
