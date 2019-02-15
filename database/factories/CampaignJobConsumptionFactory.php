<?php

use App\Acme\Models\CampaignJobConsumption;
use Faker\Generator as Faker;

$factory->define(CampaignJobConsumption::class, function (Faker $faker) {
    return [
        'hour' => $faker->dateTime(),
        'job_id' => $faker->randomNumber(),
        'click_count' => $faker->randomNumber(),
        'apply_count' => $faker->randomNumber(),
        'bucket_code' => $faker->randomElement([CampaignJobConsumption::$BUCKET_CODE_ORGANIC, CampaignJobConsumption::$BUCKET_CODE_PRIORITISE]),
    ];
});
