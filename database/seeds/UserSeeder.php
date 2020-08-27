<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

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
        $user->save();

        $admin = Role::whereIn('slug', ['admin-user'])->first();
        $user->roles()->attach($admin);

        $user = new User();
        $user->first_name = 'Marissa';
        $user->last_name = 'Hogue';
        $user->email = 'hammianne@live.com';
        $user->password = bcrypt('FloweR1314658!');
        $user->affiliate_id = 'XOR' . random_int(0,999999999999);
        $user->save();

        $client = Role::whereIn('slug', ['client-user'])->first();
        $user->roles()->attach($client);
    }
}
