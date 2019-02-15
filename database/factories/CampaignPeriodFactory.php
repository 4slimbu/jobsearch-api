<?php

use App\Acme\Models\CampaignPeriod;
use Faker\Generator as Faker;

$factory->define(CampaignPeriod::class, function (Faker $faker) {
    return [
        'start_at' => $faker->dateTime(),
        'end_at' => $faker->dateTime(),
        'rate_version_code' => $faker->word(),
        'budget' => $faker->randomFloat(),
    ];
});
