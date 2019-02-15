<?php

use App\Acme\Models\CampaignHistory;
use Faker\Generator as Faker;

$factory->define(CampaignHistory::class, function (Faker $faker) {
    return [
        'rate_version_code' => $faker->word(),
        'budget' => $faker->randomFloat(),
    ];
});
