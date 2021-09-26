<?php

namespace App\Http\Resources\Dimension;

use Illuminate\Http\Resources\Json\JsonResource;

class ThirdDimensionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pea_dept_id' => $this->pea_dept_id,
            'dimension_parent_id' => $this->dimension_parent_id,
            'name' => $this->name,
            'raw_data' => $this->raw_data,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
