<?php

namespace App\Acme\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Acme\Resources\Core\CategoryResource;
use App\Acme\Resources\Core\LocationResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $comment = [
            'id' => (integer)$this->id,
            'user_id' => (integer)$this->user_id,
            'post_id' => (integer)$this->post_id,
            'body' => (string)$this->comment_body,
            'created_at' => (string)$this->created_at,
        ];
        return $comment;
    }
}