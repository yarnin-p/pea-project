<?php

namespace App\Http\Resources\Permission;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PermissionResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($permission) {
            return [
                'id' => $permission->id,
                'method' => $permission->method,
                'endpoint' => $permission->endpoint,
                'created_at' => $permission->created_at,
                'updated_at' => $permission->updated_at
            ];
        });
    }
}
