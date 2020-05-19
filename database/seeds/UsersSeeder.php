<?php

use Illuminate\Database\Seeder;
use App\AffiliateCampaign;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 25)->create()->each(function($user)
        {
            $user->affiliatecampaigns()->save(factory(App\AffiliateCampaign::class)->make([
                'affiliate_id' => 'XOR410286573421',
                'referred_user_id' => $user->id,
                'commission_rate' => .4,
                'campaign_balance' => mt_rand(99,999),
            ]));
        });
    }
}
