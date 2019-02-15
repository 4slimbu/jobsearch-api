<?php

use App\Acme\Models\Account;
use Faker\Generator as Faker;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'company_name' => $faker->company(),
    ];
});
