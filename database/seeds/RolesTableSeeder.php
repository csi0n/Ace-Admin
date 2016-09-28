<?php

use App\Models\Admin\Permission;
use App\Models\Admin\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = new Role;
        $adminRole->name = 'Admin';
        $adminRole->slug = 'admin';
        $adminRole->description = '超级管理员';
        $adminRole->level = 1;
        $adminRole->save();

        $userRole = new Role;
        $userRole->name = 'User';
        $userRole->slug = 'user';
        $userRole->description = '普通用户';
        $userRole->level = 2;
        $userRole->save();


        $all_permissions = Permission::where('status', config('admin.global.status.active'))->get();
        foreach ($all_permissions as $permission) {
            $adminRole->attachPermission($permission);
        }

        $loginPermissions = Permission::where('slug', '=', 'admin.systems.login')->first();
        $userRole->attachPermission($loginPermissions);
    }
}
