<?php

namespace App\Acme\Services;

use App\Acme\Models\Post;
use App\Acme\Resources\PostResource;
use App\Acme\Traits\ApiResponseTrait;

use Illuminate\Support\Facades\Storage;

class PostService extends ApiServices
{
    use ApiResponseTrait;

    public function getPosts($input, $user)
    {
        $posts = Post::orderBy('created_at', 'DESC')->paginate($input['limit'] ?? 10);
        return PostResource::collection($posts);
    }

    public function createPost($input, $user)
    {
        $input['user_id'] = $user->id;
        $post = Post::create($input);
        
        if(isset($input['post_images']))
        {
            $count = 0;
            foreach ($input['post_images'] as $postImage)
            {
                $fileS3 = Storage::disk('s3')->put(
                    str_replace('{userId}',$user->id,str_replace('{postId}', $post->id, Post::$POST_IMAGES_AWS_PATH)),
                    $postImage,'public'
                );
                $filePath =  'https://s3-' . config('filesystems.disks.s3.region') . '.amazonaws.com/' . config('filesystems.disks.s3.bucket') . '/'. $fileS3;

                $inputMedia = array();
                $inputMedia['is_primary'] = $count == $input['selected_image']?true:NULL;
                $inputMedia['user_id'] = $user->id;
                $inputMedia['url'] = $filePath;
                $filePathCollection[] = $filePath;
                $media = $post->media()->create($inputMedia);
                $count++;
            }
        }

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