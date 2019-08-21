<?php

namespace App\Acme\Services;

use App\Acme\Models\Category;
use App\Acme\Resources\Core\CategoryResource;

class CategoryService extends ApiServices
{
    public function getCategories()
    {
        $categories = Category::withCount('posts')->where('status', '1')->get();
        return CategoryResource::collection($categories);
    }
}