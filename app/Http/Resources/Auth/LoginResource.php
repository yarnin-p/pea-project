<?php

namespace App\Http\Resources\Auth;

use Illuminate\Http\Resources\Json\JsonResource;

class LoginResource extends JsonResource
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
            'user' => [
                'id' => $this->user()->id,
                'name' => $this->user()->name,
                'email' => $this->user()->email,
                'email_verified_at' => $this->user()->email_verified_at ?? '',
                'created_at' => $this->user()->created_at,
                'updated_at' => $this->user()->updated_at
            ],
            'access_token' => $this->user()->createToken('authToken')->accessToken
        ];
    }
}
