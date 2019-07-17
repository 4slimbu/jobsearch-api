<?php

use App\Acme\Models\Comment;
use App\Acme\Models\Post;
use App\Acme\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    // ParentId and userId for normal comments
    $parentId = NULL;
    $userId = User::all()->random()->id;

    // Reply to 70% comment
    if ($faker->boolean(70)) {
        $parentCommentsCount = Comment::count();

        if ($parentCommentsCount > 0) {
            $parentComment = Comment::all()->random();
            // Get author of post on which parent comment is made
            $post = Post::where('id', $parentComment->post_id)->first();
            $postCreatorId = $post->user_id;

            if ($postCreatorId) {
                // Reply is made by post creator
                $userId = $postCreatorId;
                $parentId = $parentComment->id;
            }
        }
    }

    return [
        'user_id' => $userId,
        'parent_id' => $parentId,
        'comment_body' => $faker->text(100),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
