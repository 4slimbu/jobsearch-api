<?php

namespace App\Acme\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Acme\Resources\Core\CategoryResource;
use App\Acme\Resources\Core\LocationResource;
use App\Acme\Resources\MediaResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $post = [
            'id' => (integer)$this->id,
            'user_id' => (integer)$this->user_id,
            'title' => (string)$this->post_title,
            'body' => (string)$this->post_body,
            'created_at' => (string)$this->created_at,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'location' => new LocationResource($this->whenLoaded('location')),
            'postImages' => new MediaResource($this->whenLoaded('media')),
        ];
        return $post;
    }
}