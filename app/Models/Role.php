<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Bican\Roles\Models\Role as BicanRole;
class Role extends BicanRole
{
    public function permissions()
    {
        return $this->belongsToMany('App\Models\Permission','permission_role','role_id','permission_id')
            ->withTimestamps();
    }
}
