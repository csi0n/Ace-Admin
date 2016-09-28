<?php

namespace App\Models\Admin;

use App\Traits\ActionButton;
use Bican\Roles\Models\Permission as BicanPermission;

class Permission extends BicanPermission
{
    use ActionButton;
    protected $fillable = ['name', 'slug', 'description', 'model', 'status'];

    /**
     * Permission constructor.
     */
    public function __construct()
    {
        $this->_permission_edit = config('admin.permissions.permission.edit');
        $this->_permission_delete = config('admin.permissions.permission.delete');
        $this->_module = config('admin.module.permissions');
    }


    public function role()
    {
        return $this->belongsToMany('App\Models\Admin\Role');
    }
}
