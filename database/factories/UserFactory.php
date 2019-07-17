<?php

use App\Acme\Models\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {
    // Images already uploaded to aws bucket
    $awsImages = [
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/74/UbGo6y1D2bygQgaHbAw70yy6pvbhtiObpZXiMFka.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/74/8W3WmM2iJA8TFfse5OSpvhZhhoPUKZNwRhP0jZ15.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/74/xAgjVvaCfesZQYIodAxJJ574ZzZoWCHieCkQqE1T.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/75/6QmqeaZnV3x8TN3mWlhP4sJLc5NCO7Kd0ZwiEVDJ.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/75/GS8Q1CaD5lT30jqTqYtOJz2vjkYpSjwG11oiIAqD.jpeg",
        "https://s3-ap-southeast-2.amazonaws.com/loksewa/loksewa/28/75/bRhIAxgptDB5mZBXKovwqKbJv3RpviTfLMXuaJ77.jpeg",
    ];

    return [
        'first_name' => $faker->firstName(),
        'last_name' => $faker->lastName(),
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('password'),
        'gender' => $faker->randomElement(['male', 'female']),
        'contact_number' => $faker->phoneNumber,
        'verified' => $faker->boolean(95),
        'is_active' => $faker->boolean(95),
        'profile_pic' => $faker->randomElement($awsImages)
    ];
});
