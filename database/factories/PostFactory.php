<?php

use App\Acme\Models\Category;
use App\Acme\Models\Post;
use App\Acme\Models\User;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    return [
        'user_id' => User::all()->random()->id,
        'post_title' => $faker->jobTitle,
        'post_body' => $faker->realText(),
        'location_id' => 1,
        'category_id' => Category::all()->random()->id,
        'expire_at' => Carbon::now()->addDays($faker->randomElement([10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60])),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
