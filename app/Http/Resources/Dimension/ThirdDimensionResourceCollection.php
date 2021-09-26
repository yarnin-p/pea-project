<?php

namespace App\Http\Resources\Dimension;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ThirdDimensionResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($thirdDimension) {
            return [
                'id' => $thirdDimension->id,
                'pea_dept_id' => $thirdDimension->pea_dept_id,
                'dimension_parent_id' => $thirdDimension->dimension_parent_id,
                'name' => $thirdDimension->name,
                'raw_data' => $thirdDimension->raw_data,
                'created_at' => $thirdDimension->created_at,
                'updated_at' => $thirdDimension->updated_at,
            ];
        });
    }
}
