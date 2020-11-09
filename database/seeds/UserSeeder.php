<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use App\AffiliateCampaign;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->first_name = 'Robbie';
        $user->last_name = 'Bertram';
        $user->email = 'programmers.rule.the.world@gmail.com';
        $user->password = bcrypt('NoSuch@g3ncy');
        $user->affiliate_id = 'XOR' . random_int(0,999999999999);
        $user->createAsStripeCustomer();
        $user->save();

        $admin = Role::whereIn('slug', ['admin-user'])->first();
        $user->roles()->attach($admin);
    }
}
