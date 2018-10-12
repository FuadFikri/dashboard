<?php

use Faker\Generator as Faker;

$factory->define(App\Asset::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence,
        'desc' => $faker->text,
        'file' => $faker->url,
        'thumbnail' => $faker->url,
    ];
});
