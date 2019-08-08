<?php

namespace App\Acme\Controllers;
use App\Acme\Services\PostService;
use App\Acme\Requests\PostGetRequest;

class PublicPostController extends ApiController
{
    private $postService;

    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function index(PostGetRequest $request)
    {
        $input = $request->getInput();
        return $this->postService->getPublicPosts($input);
    }

    public function show($postId)
    {
        $input['id'] = $postId;
        return $this->postService->getPublicPost($input);
    }
}