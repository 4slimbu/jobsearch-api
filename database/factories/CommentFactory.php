<?php

use App\Acme\Models\Comment;
use App\Acme\Models\Post;
use App\Acme\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    $userId = User::all()->random()->id;
    $postId = Post::all()->random()->id;
    return [
        'user_id' => $userId,
        'parent_id' => null,
        'post_id' => $postId,
        'comment_body' => $faker->realText(),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
