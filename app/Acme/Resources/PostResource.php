<?php

namespace App\Acme\Resources;

use App\Acme\Resources\Core\CategoryResource;
use App\Acme\Resources\Core\LocationResource;
use Illuminate\Http\Resources\Json\JsonResource;

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
            'address' => (string)$this->address,
            'latitude' => (string) $this->latitude,
            'longitude' => (string) $this->longitude,
            'distance' => (string) $this->distance,
            'is_featured' => (bool) $this->is_featured,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
            'author' => new PostUserResource($this->user),
            'category' => new CategoryResource($this->whenLoaded('category')),
            'postImages' => MediaResource::collection($this->whenLoaded('media')),
        ];
        if (auth()->user()) {
            if ($this->user_id === auth()->user()->id) {
                $post['postComments'] = CommentResource::collection($this->comments);
            } else {
                $post['postComments'] = CommentResource::collection(($this->myComments));
            }
        }
        return $post;
    }

}