<?php

use App\Models\Permission;
use App\Models\Role;
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
        $adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => '超级管理员',
            'level' => 1,
        ]);

        $userRole = Role::create([
            'name' => 'User',
            'slug' => 'user',
            'description' => '普通用户',
        ]);

        $all_permissions=Permission::where('status',config('admin.global.status.active'));
        foreach ($all_permissions as $permission){
            $adminRole->attachPermission($permission);
        }

        $loginPermissions=Permission::where('slug','=','admin.systems.login')->first();
        $userRole->attachPermission($loginPermissions);
    }
}
