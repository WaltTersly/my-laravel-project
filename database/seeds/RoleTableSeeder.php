<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_user = new Role();
        $role_user->rname = 'user';
        $role_user->description = 'normal user';
        $role_user->save();

        $role_trainer = new Role();
        $role_trainer->rname = 'trainer';
        $role_trainer->description = 'a trainer';
        $role_trainer->save();

        $role_cashier = new Role();
        $role_cashier->rname = 'cashier';
        $role_cashier->description = 'cashier';
        $role_cashier->save();

        $role_manager = new Role();
        $role_manager->rname = 'manager';
        $role_manager->description = 'a manager';
        $role_manager->save();

        $role_admin = new Role();
        $role_admin->rname = 'Admin';
        $role_admin->description = 'Administrator';
        $role_admin->save();
        //
    }
}
