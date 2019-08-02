<?php

namespace App\Acme\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $page = [
            'id' => (integer)$this->id,
            'title' => (string)$this->title,
            'slug' => (string)$this->slug,
            'url' => (string)$this->url,
        ];

        return $page;
    }

}