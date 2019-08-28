<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ClientApplication;
use Faker\Generator as Faker;

$factory->define(ClientApplication::class, function (Faker $faker) {
    return [
        'ref_id' => rand(0,9999999999),
        'name' => $faker->name,
        'company' => $faker->sentence,
        'email' => Str::random(10).'@nsa.gov',
        'number' => rand(0000000000,9999999999),
        'project' => $faker->sentence,
        'user_id' => 1,
    ];
});
