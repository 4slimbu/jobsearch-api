<?php

use App\Acme\Models\Campaign;
use Faker\Generator as Faker;

$factory->define(Campaign::class, function (Faker $faker) {
    return [
        'code' => uniqid(),
        'rate_version_code' => $faker->word(),
        'budget' => $faker->randomFloat('2'),
    ];
});
