<?php

use App\Acme\Models\Comment;
use App\Acme\Models\Post;
use App\Acme\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {

    return [
        'comment_body' => $faker->text(100),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
