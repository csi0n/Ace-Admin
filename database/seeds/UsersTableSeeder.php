<?php

use App\Models\Role;
use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User;
        $admin->name = 'csi0n';
        $admin->email = 'admin@admin.com';
        $admin->password = bcrypt('123456');
        $admin->save();

        $user = new User;
        $user->name = 'user';
        $user->email = 'user@user.com';
        $user->password = bcrypt('123456');
        $user->save();

        $adminRole = Role::where('slug', 'admin')->first();
        $userRole = Role::where('slug', 'user')->first();

        $admin->attachRole($adminRole);
        $user->attachRole($userRole);
    }
}
