<?php
/**
 * Created by csi0n
 * User: huaqing.chen
 * Date: 9/19/16
 * Time: 20:01
 */
return [
    'permission' => [
        'list' => [
            'name' => 'admin.permissions.list',
            'only' => ['index', 'ajaxIndex'],
            'except' => [],
        ],
        'create' => [
            'name' => 'admin.permissions.create',
            'only' => ['create', 'store'],
            'except' => [],
        ],
        'edit' => [
            'name' => 'admin.permissions.edit',
            'only' => ['edit', 'update'],
            'except' => [],
        ],
        'delete' => [
            'name' => 'admin.permissions.delete',
            'only' => ['destroy'],
            'except' => [],
        ],
    ],
    'menu' => [
        'list' => [
            'name' => 'admin.menus.list',
            'only' => ['index', 'ajaxIndex'],
            'except' => [],
        ],
        'create' => [
            'name' => 'admin.menus.create',
            'only' => ['create', 'store'],
            'except' => [],
        ],
        'edit' => [
            'name' => 'admin.menus.edit',
            'only' => ['edit', 'update'],
            'except' => [],
        ],
        'delete' => [
            'name' => 'admin.menus.delete',
            'only' => ['destroy'],
            'except' => [],
        ],
    ],
    'role' => [
        'list' => [
            'name' => 'admin.roles.list',
            'only' => ['index', 'ajaxIndex'],
        ],
        'create' => [
            'name' => 'admin.roles.create',
            'only' => ['create', 'store'],
            'except' => []
        ],
        'edit' => [
            'name' => 'admin.roles.edit',
            'only' => ['edit', 'update'],
            'except' => [],
        ],
        'delete' => [
            'name' => 'admin.roles.delete',
            'only' => ['destroy'],
            'except' => [],
        ],
    ],
    'user' => [
        'list' => [
            'name' => 'admin.users.list',
            'only' => ['index', 'ajaxIndex'],
            'except' => [],
        ],
        'create' => [
            'name' => 'admin.users.create',
            'only' => ['create', 'store'],
            'except' => [],
        ],
        'edit' => [
            'name' => 'admin.users.edit',
            'only' => ['edit', 'update'],
            'except' => [],
        ],
        'delete' => [
            'name' => 'admin.users.delete',
            'only' => ['destroy'],
            'except' => [],
        ],
    ],
];