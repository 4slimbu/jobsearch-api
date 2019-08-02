<?php

use App\Acme\Models\Category;
use App\Acme\Models\Post;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {

    return [
        'post_title' => $faker->jobTitle,
        'post_body' => $faker->text(500),
        'address' => $faker->address,
        'latitude' => $faker->latitude(32, 35),
        'longitude' => $faker->longitude(150, 153),
        'category_id' => Category::all()->random()->id,
//        'expire_at' => Carbon::now()->addDays($faker->randomElement([10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60])),
        'created_at' => Carbon::now(),
        'updated_at' => Carbon::now(),
    ];
});
