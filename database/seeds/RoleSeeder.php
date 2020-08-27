<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new Role();
        $admin->name = 'Admin';
        $admin->slug = 'admin-user';
        $admin->save();

        $client = new Role();
        $client->name = 'Client';
        $client->slug = 'client-user';
        $client->save();
        $clientPrivileges = Permission::where(['category' => 'Client'])->get();
        foreach($clientPrivileges as $clientPrivilege)
        {
        $client->permissions()->attach($clientPrivilege);
        }

        $developer = new Role();
        $developer->name = 'Developer';
        $developer->slug = 'developer-user';
        $developer->save();
        $developerPrivileges = Permission::whereIn('category', ['Client', 'Developer'])->get();
        foreach($developerPrivileges as $developerPrivilege)
        {
            $developer->permissions()->attach($developerPrivilege);
        }
    }
}
