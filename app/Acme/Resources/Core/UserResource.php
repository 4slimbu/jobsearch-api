<?php

namespace App\Acme\Resources\Core;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (integer)$this->id,
            'first_name' => (string)$this->first_name,
            'last_name' => (string)$this->last_name,
            'full_name' => (string)$this->full_name,
            'contact_number' => (string)$this->contact_number,
            'email' => (string)$this->email,
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
        ];
    }
}
