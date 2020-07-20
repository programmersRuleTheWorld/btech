<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\AffiliateCampaign;
use Faker\Generator as Faker;

$factory->define(AffiliateCampaign::class, function (Faker $faker) {
    return [
        'affiliate_id' => 'XOR500910821256',
        'referred_user_id' => mt_rand(2, 1000),
        'commission_rate' => .4,
        'campaign_balance' => mt_rand(99,999),
    ];
});
