<?php

namespace App\Models;

use App\Traits\ActionButton;
use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Models\Role as BicanRole;
class Role extends BicanRole
{
    use ActionButton;

    /**
     * Role constructor.
     */
    public function __construct()
    {
        $this->_permission_edit=config('admin.permissions.role.edit');
        $this->_permission_delete=config('admin.permissions.role.delete');
        $this->_module=config('admin.module.role');
    }

    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission','permission_role','role_id','permission_id')
            ->withTimestamps();
    }
}
