<?php

namespace App\Acme\Services;

use App\Acme\Events\PostCreatedEvent;
use App\Acme\Models\Media;
use App\Acme\Models\Post;
use App\Acme\Resources\PostResource;
use App\Acme\Traits\ApiResponseTrait;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService extends ApiServices
{
    use ApiResponseTrait;

    public function getPosts($input, $user)
    {
        $latitude = (float) $user->latitude;
        $longitude = (float) $user->longitude;

        $distance = "(
              6371 * acos (
              cos ( radians(" . $latitude . ") )
              * cos( radians( latitude ) )
              * cos( radians( longitude ) - radians(" . $longitude . ") )
              + sin ( radians(" . $latitude . ") )
              * sin( radians( latitude ) )
            )
        )";

        $posts = Post::select('*', DB::raw($distance . " AS distance"));

        // Filter by category
        if (isset($input['category'])) {
            $categoryIds = explode(',',$input['category']);

            $posts = $posts->whereIn('category_id', $categoryIds);
        };

        // Filter by search text
        if (isset($input['search'])) {
            $posts = $posts->where(function($q) use ($input) {
                $q->where('post_title', 'LIKE', "%{$input['search']}%")
                    ->orWhere('post_body', 'LIKE', "%{$input['search']}%");
            });

//            SearchLogService::log($input['search'], auth()->user()->id);
        }

        // Filter user posts
        if (isset($input['type']) && $input['type'] === 'my') {
            $posts = $posts->where('user_id', auth()->user()->id);
        }

        // Filter saved posts
        if (isset($input['type']) && $input['type'] === 'saved') {
            $posts = $posts->whereIn('id', auth()->user()->preferences['savedPosts']);
        }

        // Filter by distance
        // Sometimes there will be no posts if radius is low, so if user has choosen
        // to display posts by latest, for now, lets disable radius. Later on, they will
        // be provided with control to enable disable radius.
        if (isset($input['radius']) && ! (isset($input['orderBy']) && $input['orderBy'] === 'latest')) {
            $posts = $posts->where(DB::raw($distance), '<',  $input['radius']);
        }

        if (isset($input['orderBy']) && $input['orderBy'] === 'latest') {
            $posts = $posts->orderBy('created_at', 'DESC');
        } else {
            // By default, posts are order by nearest distance
            $posts = $posts->orderBy('distance', 'ASC');
        }

        // Paginate
        $posts = $posts->paginate($input['limit'] ?? 10);

        // Return response
        return PostResource::collection($posts);
    }

    public function getPublicPosts($input)
    {
        $posts = Post::orderBy('created_at', 'desc')->limit(50)->get();
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

        event(new PostCreatedEvent($post));
        return new PostResource($post);
    }

    public function updatePost($input, $user)
    {
        $post = Post::where('id', $input['id'])->firstOrFail();

        if (!$user->can('updatePost', $post)) {
            return $this->respondWithNotAllowed();
        }

        $post->update($input);

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

        if (isset($input['images_to_remove'])) {
            Media::whereIn('id', $input['images_to_remove'])->delete();
        }

        return new PostResource($post);
    }

    public function getPost($input, $user)
    {
        $latitude = (float) $user->latitude;
        $longitude = (float) $user->longitude;

        $distance = "(
              6371 * acos (
              cos ( radians(" . $latitude . ") )
              * cos( radians( latitude ) )
              * cos( radians( longitude ) - radians(" . $longitude . ") )
              + sin ( radians(" . $latitude . ") )
              * sin( radians( latitude ) )
            )
        )";

        $post = Post::select('*', DB::raw($distance . " AS distance"))
            ->where('id', $input['id'])->firstOrFail();
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

    public function flagPost($id)
    {
        $post = Post::where('id', $id)->firstOrFail();
        $newFlagCount = $post->flag_count + 1;

        $result = $post->update(['flag_count' => $newFlagCount]);

        if ($result) {
            return $this->respondWithSuccess('Post flagged successfully', 'FlagPostSuccess')->setStatusCode(200);
        }

        return $this->respondInternalError();
    }
}