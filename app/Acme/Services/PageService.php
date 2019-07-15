<?php

namespace App\Acme\Services;

use App\Acme\Events\PageCreatedEvent;
use App\Acme\Models\Media;
use App\Acme\Models\Page;
use App\Acme\Resources\PageResource;
use App\Acme\Traits\ApiResponseTrait;

use Illuminate\Support\Facades\Storage;

class PageService extends ApiServices
{
    use ApiResponseTrait;

    public function getPages($input, $user)
    {
        $pages = Page::orderBy('created_at', 'DESC');

        $pages = $pages->paginate($input['limit'] ?? 10);

        return PageResource::collection($pages);
    }

    public function getPage($input, $user)
    {
        $page = Page::where('slug', $input['slug'])->firstOrFail();
        return new PageResource($page);
    }

}