<?php

use App\Acme\Models\JobHopper;
use Faker\Generator as Faker;

$factory->define(JobHopper::class, function (Faker $faker) {
    return [
        'uuid' => uniqid(),
        'bucket_code' => 'ORGANIC',
        'job_title' => $faker->sentence(),
        'job_body' => $faker->paragraph(),
        'job_logo' => $faker->imageUrl(),
        'employer_name' => $faker->company(),
        'apply_url' => $faker->url(),
    ];
});
