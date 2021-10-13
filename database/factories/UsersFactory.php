<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

use App\User;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker) {

    $user = User::find(1);
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'company_name' => $faker->company,
        'email' => $faker->unique()->safeEmail,
        'affiliate_id' => 'XOR' . rand(),
        'referred_by' => $user->affiliate_id,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
    ];
});