<?php

namespace App\Models;
use Bican\Roles\Models\Permission as BicanPermission;

class Permission extends BicanPermission
{
    public function role()
    {
        return $this->belongsToMany('App\Models\Role');
    }
}
