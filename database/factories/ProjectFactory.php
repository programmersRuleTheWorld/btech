<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ClientApplication;
use Faker\Generator as Faker;
use Ramsey\Uuid\Uuid;


$factory->define(ClientApplication::class, function (Faker $faker) {

    return [   
        'ref_id' => mt_rand(100000000000000,999999999999999),
        'name' => $faker->name,
        'company' => $faker->sentence,
        'email' => $faker->email . '@ex.net',
        'selection' => 'buttsbuttsbutts',
        'auth_code' => Uuid::uuid4(),
        'number' => mt_rand(),
        'status' => 'late',
        'project' => $faker->sentence,
        'user_id' => 1,
        'dev_id' => 1
    ];
});
