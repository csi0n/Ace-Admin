<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create([
            'name'=>'系统管理',
            'slug'=>'admin.systems.manage',
            'description'=>'系统管理'
        ]);

        Permission::create([
            'name'=>'登录后台',
            'slug'=>'admin.systems.login',
            'description'=>'登录后台'
        ]);

        /*菜单权限*/
        Permission::create([
            'name' => '显示菜单列表',
            'slug' => 'admin.menus.list',
            'description' => '显示菜单列表'
        ]);
        Permission::create([
            'name' => '创建菜单',
            'slug' => 'admin.menus.create',
            'description' => '创建菜单'
        ]);
        Permission::create([
            'name' => 'Menus delete',
            'slug' => 'admin.menus.delete',
            'description' => '删除菜单'
        ]);
        Permission::create([
            'name' => 'Menus edit',
            'slug' => 'admin.menus.edit',
            'description' => '修改菜单'
        ]);


        Permission::create([
            'name' => '显示角色列表',
            'slug' => 'admin.roles.list',
            'description' => '显示角色列表'
        ]);


        Permission::create([
            'name' => '创建角色',
            'slug' => 'admin.roles.create',
            'description' => '创建角色'
        ]);


        Permission::create([
            'name' => '删除角色',
            'slug' => 'admin.roles.delete',
            'description' => '删除角色'
        ]);


        Permission::create([
            'name' => '修改角色',
            'slug' => 'admin.roles.edit',
            'description' => '修改角色'
        ]);
    }
}
