<?php

namespace App\Acme\Services;

use App\Acme\Models\Post;
use App\Acme\Resources\PostResource;
use App\Acme\Traits\ApiResponseTrait;

class PostService extends ApiServices
{
    use ApiResponseTrait;

    public function getPosts($input, $user)
    {
        $posts = Post::get();
        return PostResource::collection($posts);
    }

    public function createPost($input, $user)
    {
        $input['user_id'] = $user->id;
        $post = Post::create($input);
        return new PostResource($post);
    }

    public function updatePost($input, $user)
    {
        $post = Post::where('id', $input['id'])->firstOrFail();

        if (!$user->can('updatePost', $post)) {
            return $this->respondWithNotAllowed();
        }

        $post->update($input);
        return new PostResource($post);
    }

    public function getPost($input, $user)
    {
        $post = Post::where('id', $input['id'])->firstOrFail();
        return new PostResource($post);
    }

    public function destroyPost($input, $user)
    {
        $post = Post::where('id', $input['id'])->firstOrFail();
        if (!$user->can('deletePost', $post)) {
            return $this->respondWithNotAllowed();
        }
        $post->delete();
    }
}