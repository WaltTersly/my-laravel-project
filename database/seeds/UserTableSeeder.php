<?php

use Illuminate\Database\Seeder;
use App\Role;
Use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role_user = Role::where('rname', 'user')->first();
        $role_trainer = Role::where('rname', 'trainer')->first();
        $role_admin = Role::where('rname', 'Admin')->first();
        $role_cashier = Role::where('rname', 'cashier')->first();
        $role_manager = Role::where('rname', 'manager')->first();

        $user = new User();
        $user->name = 'victor';
        $user->lname = 'member';
        $user->email = 'member@example.com';
        $user->password = bcrypt('member');
        $user->save();
        $user->roles()->attach($role_user);

        $user = new User();
        $user->name = 'valter';
        $user->lname = 'Admin';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('admin');
        $user->save();
        $user->roles()->attach($role_admin);

        $user = new User();
        $user->name = 'tracy';
        $user->lname = 'trainer';
        $user->email = 'trainer@example.com';
        $user->password = bcrypt('trainer');
        $user->save();
        $user->roles()->attach($role_trainer);

        $user = new User();
        $user->name = 'walter';
        $user->lname = 'cashier';
        $user->email = 'cashier@example.com';
        $user->password = bcrypt('cashier');
        $user->save();
        $user->roles()->attach($role_cashier);

        $user = new User();
        $user->name = 'Denno';
        $user->lname = 'manager';
        $user->email = 'manager@example.com';
        $user->password = bcrypt('manager');
        $user->save();
        $user->roles()->attach($role_manager);
        //
    }
}
