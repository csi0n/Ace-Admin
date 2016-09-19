<?php

namespace App\Models;

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
        $this->permission_edit = config('admin.permissions.permission.edit');
        $this->permission_delete = config('admin.permissions.permission.delete');
        $this->module = config('admin.module.permissions');
    }


    public function role()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
