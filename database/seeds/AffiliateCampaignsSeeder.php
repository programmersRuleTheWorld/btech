<?php

use Illuminate\Database\Seeder;

class AffiliateCampaignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\AffiliateCampaign::class, 25)->create();
    }
}
