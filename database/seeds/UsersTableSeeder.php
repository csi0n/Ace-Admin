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
        $admin=User::create([
            'name'=>'csi0n',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('123456'),
        ]);
        $user=User::create([
            'name'=>'user',
            'email'=>'user@user.com',
            'password'=>bcrypt('123456'),
        ]);

        $adminRole=Role::where('slug','admin')->first();
        $userRole=Role::where('slug','user')->first();

        $admin->attachRole($adminRole);
        $user->attachRole($userRole);
    }
}
