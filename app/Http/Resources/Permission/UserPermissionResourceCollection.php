<?php

namespace App\Http\Resources\Permission;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserPermissionResourceCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return $this->collection->map(function ($userPermission) {
            return [
                'id' => $userPermission->id,
                'method' => $userPermission->permissions->method,
                'endpoint' => $userPermission->permissions->endpoint,
                'user' => $userPermission->users->name,
                'created_at' => $userPermission->permissions->created_at
            ];
        });
    }
}
