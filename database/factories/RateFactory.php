<?php

use App\Acme\Models\Rate;
use Faker\Generator as Faker;

$factory->define(Rate::class, function (Faker $faker) {
    return [
        'version_code' => $faker->word(),
        'rate_type' => $faker->randomElement([Rate::$RATE_TYPE_CPC, Rate::$RATE_TYPE_APPLY]),
        'from' => 1,
        'to' => 500,
        'rate' => $faker->randomFloat(),
    ];
});
